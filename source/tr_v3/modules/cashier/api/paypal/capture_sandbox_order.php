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

# Execute
$orderId = $_GET['orderId'];

$r = Paypal::curlCaptureSandboxOrder($orderId);

$r_decoded = json_decode($r); 

# Check if Paypal payment capture successful, Throw Exception If Not
if(!($r_decoded->status == 'COMPLETED')) {
    Exceptions::throwJsonException('Payment unsuccessful. Checkout terminated.');
}

# OPTIONALLY GENERATE CASHIER RECEIPT
$receiptId = CashierReceipt::insert([
    'email' => $r_decoded->payment_source->paypal->email_address,
    'payment_mode' => PAYPAL_MODE,
    'payment_type' => 'paypal',
    'currency' => $r_decoded->purchase_units[0]->payments->captures[0]->amount->currency_code, // The capture id,
    'amount' => $r_decoded->purchase_units[0]->payments->captures[0]->amount->value * 100, // Amount in cents
    'paypal_fee' => $r_decoded->purchase_units[0]->payments->captures[0]->seller_receivable_breakdown->paypal_fee->value * 100, // Amount in cents
    'net_amount' => $r_decoded->purchase_units[0]->payments->captures[0]->seller_receivable_breakdown->net_amount->value * 100, // Amount in cents
    'paypal_payment_identifier' => $r_decoded->purchase_units[0]->payments->captures[0]->id, // The capture id
    'user_id' => null,
    'order_id' => null
]);

echo $r;

?>