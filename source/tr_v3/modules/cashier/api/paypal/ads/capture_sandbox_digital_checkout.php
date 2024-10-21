<?php

/*
- Create a sandbox order
- Assumes Oauth 2 Token is available (see the cron script)
- See https://developer.paypal.com/docs/api/orders/v2/
*/

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# VALIDATE
$job_id = $_POST['job_id'];
$job = JobDB::find($job_id);

if($job->is_featured == 1) {
    Exceptions::throwJsonException('The job listing is already featured.');
}

# Optionally obtained user_id if user is logged in
$auth = Delight::getAuth();
$user_id = null;
if(!empty($auth)) {
    $user_id = $auth->getUserId();
}

# Execute
$orderId = $_GET['orderId'];

$r = PaypalDigitalCheckout::curlCaptureSandboxPurchase($orderId);

$r_decoded = json_decode($r); 

# Check if Paypal payment capture successful, Throw Exception If Not
if(!($r_decoded->status == 'COMPLETED')) {
    Exceptions::throwJsonException('Payment unsuccessful. Checkout terminated.');
}

# SUCCESS! PERFORM WORKFLOW
$dt = new DateTime();
$dt->modify( '+1 month' );

JobDB::update($job_id, [
    'is_featured' => 1,
    'sponsor_expires_on' => $dt->format('Y-m-d H:i:s')
]);

# OPTIONALLY GENERATE CASHIER RECEIPT
$receiptId = CashierReceipt::insert([
    'email' => $r_decoded->payment_source->paypal->email_address,
    'description' => "Sponsored ad for job listing ID: $job_id",
    'payment_mode' => PAYPAL_MODE,
    'payment_type' => 'paypal',
    'currency' => $r_decoded->purchase_units[0]->payments->captures[0]->amount->currency_code, // The capture id,
    'amount' => $r_decoded->purchase_units[0]->payments->captures[0]->amount->value * 100, // Amount in cents
    'paypal_fee' => $r_decoded->purchase_units[0]->payments->captures[0]->seller_receivable_breakdown->paypal_fee->value * 100, // Amount in cents
    'net_amount' => $r_decoded->purchase_units[0]->payments->captures[0]->seller_receivable_breakdown->net_amount->value * 100, // Amount in cents
    'paypal_payment_identifier' => $r_decoded->purchase_units[0]->payments->captures[0]->id, // The capture id
    'user_id' => $user_id,
    'order_id' => null
]);

echo $r;

?>