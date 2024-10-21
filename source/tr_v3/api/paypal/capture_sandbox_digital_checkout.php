<?php

/*
- Create a sandbox order
- Assumes Oauth 2 Token is available (see the cron script)
- See https://developer.paypal.com/docs/api/orders/v2/

// SAMPLE RESPONSE FROM SUCCESSFUL PAYPAL CAPTURE
// Receipt Link: https://www.sandbox.paypal.com/activity/payment/51649387RP562621C

See https://github.com/lewweiming/ecx/blob/main/documentation/paypal/SAMPLE_CAPTURE_RESPONSE.md
*/

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Load Additional Functions

/***
 * $amount = array()
 *  [value] => 10.00
 *  [currency_code] => USD
 *  */
function getTotalAmountFromPaypalResponse($paypal_decoded_response) {
    return $paypal_decoded_response['purchase_units'][0]['payments']['captures'][0]['amount'];
}

function getTransactionIdFromPaypalResponse($paypal_decoded_response) {
    return $paypal_decoded_response['purchase_units'][0]['payments']['captures'][0]['id'];
}

function getInvoiceIdFromPaypalResponse($paypal_decoded_response) {
    return $paypal_decoded_response['purchase_units'][0]['payments']['captures'][0]['invoice_id'];
}

function getEmailFromPaypalResponse($paypal_decoded_response) {
    return $paypal_decoded_response['payment_source']['paypal']['email_address'];
}

// In cents
function getPaypalFeeFromPaypalResponse($paypal_decoded_response) {
    return $paypal_decoded_response['purchase_units'][0]['payments']['captures'][0]['seller_receivable_breakdown']['paypal_fee']['value'] * 100;
}

// In cents
function getNetAmountFromPaypalResponse($paypal_decoded_response) {
    return $paypal_decoded_response['purchase_units'][0]['payments']['captures'][0]['seller_receivable_breakdown']['net_amount']['value'] * 100;
}

# Get incoming data
// $listing_id = $_POST['listing_id'];

# Decode Customer Payload
if(isset($_POST['customer'])) {
    $customer_data = json_decode($_POST['customer'], true);
}

# Optionally obtained user_id if user is logged in
$auth = Delight::getAuth();
$user_id = null;
if(!empty($auth)) {
    $user_id = $auth->getUserId();
}

# Run
$orderId = $_GET['orderId'];

$r = PaypalDigitalCheckout::curlCaptureSandboxPurchase($orderId);

$r_decoded = json_decode($r, true);

# If success

## Mark Listing as is_premium
// $d = new DateTime();
// $d->modify( '+1 month' );
// Listing::update($listing_id, [
//     'is_premium' => 1,
//     'premium_expires_on' => $d->format('Y-m-d H:i:s')
// ]);


## Generate receipt, viewable by agent dashboard
$order_hash = getInvoiceIdFromPaypalResponse($r_decoded);
$amount = getTotalAmountFromPaypalResponse($r_decoded);
$paypal_transaction_id = getTransactionIdFromPaypalResponse($r_decoded);
$email = getEmailFromPaypalResponse($r_decoded);
$paypal_fee = getPaypalFeeFromPaypalResponse($r_decoded);
$net_amount = getNetAmountFromPaypalResponse($r_decoded);

// CashierReceipt::insert([
//     'payment_mode' => 'sandbox',
//     'email' => $email,
//     'user_id' => $user_id,
//     'order_hash' => $order_hash,
// // 'customer_name' => $customer_data['firstName'],
//     'amount' => $amount['value'],
//     'currency' => $amount['currency_code'],
//     'description' => 'Premium listing upgrade',
//     'payment_type' => 'Paypal',
//     'paypal_fee' => $paypal_fee,
//     'net_amount' => $net_amount,
//     'paypal_invoice_id' => $order_hash,
//     'digital_receipt_url' => "https://www.sandbox.paypal.com/activity/payment/" . $paypal_transaction_id
// ]);

## OPTIONAL: SEND CUSTOMER BOOKING CONFIRMATION EMAIL
// Mail::sendOrderConfirmation($customer_data['email'], $order);

## OPTIONAL: SEND PUSHOVER NOTIFCATION FOR NEWLY CAPTURED BOOKINGS
// Pushover::send('IKA: New listing upgrade purchased (sandbox)');

echo $r;

?>