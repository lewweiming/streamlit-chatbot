<?php

/*
- Create a sandbox order
- Assumes Oauth 2 Token is available (see the cron script)
- See https://developer.paypal.com/docs/api/orders/v2/

// SAMPLE RESPONSE FROM SUCCESSFUL PAYPAL CAPTURE
// Receipt Link: https://www.sandbox.paypal.com/activity/payment/51649387RP562621C

See https://github.com/lewweiming/ecx/blob/main/documentation/paypal/SAMPLE_CAPTURE_RESPONSE.md

WORKFLOW:
- Create booking
- Create receipt
- Email customer
- Notify admin via inbox
- Notify admin via Pusher
*/

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Load Additional Functions
function getOrderTotal($cart_data) {

    $totalCost = ShopCostCalculator::calculateTotalCost($cart_data);

    return $totalCost;
}

// Get the shipping address as a json str
function getShippingAddress($order_data, $return_as_json = true) {
    
    $address = [
        'address' => $order_data['address'],
        'city' => $order_data['city'],
        'state' => $order_data['state'],
        'country' => $order_data['country'],
        'postalCode' => $order_data['postalCode']
    ];

    if($return_as_json) {

        $address = json_encode($address);
    }

    return $address;
}


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
    return $paypal_decoded_response['purchase_units'][0]['payments']['captures'][0]['seller_receivable_breakdown']['paypal_fee']['value'];
}

// In cents
function getNetAmountFromPaypalResponse($paypal_decoded_response) {
    return $paypal_decoded_response['purchase_units'][0]['payments']['captures'][0]['seller_receivable_breakdown']['net_amount']['value'];
}

# Get incoming data
// $listing_id = $_POST['listing_id'];

# Decode Customer Payload
// if(isset($_POST['customer'])) {
//     $customer_data = json_decode($_POST['customer'], true);
// }

# Optionally obtained user_id if user is logged in
// $auth = Delight::getAuth();
// $user_id = null;
// if(!empty($auth)) {
//     $user_id = $auth->getUserId();
// }

# Run
$orderId = $_GET['orderId'];

$r = PaypalDigitalCheckout::curlCaptureSandboxPurchase($orderId);

$r_decoded = json_decode($r, true);

# If success
// Finalise the booking data to be inserted into table
$shopSession = new ShopSessionManager();
$cart_data = $shopSession->getAllItems();
$order_data = $shopSession->getOrderDetails();

// Example array from session manager
// (
//     [carType] => midsize
//     [pickupDate] => 2024-10-25
//     [returnDate] => 2024-10-23
//     [insurance] => false
//     [gps] => false
//     [name] => John Smith
//     [email] => socrates3142@gmail.com
//     [phone] => 2343423
// )

$order = [
    'booking_ref' => ShopOrder::getNewBookingReference(), // A short 7 character alpha numeric code in CAPS
    'customer_name' => $order_data['name'],
    'customer_email' => $order_data['email'],
    'customer_phone' => $order_data['phone'],
    'user_id' => null,
    'items' => json_encode($cart_data),
    'total_amount' => getOrderTotal($cart_data), // 100.00
    'shipping_address' => getShippingAddress($order_data),
    'billing_address' => null,
    'payment_method' => 'paypal',
    'shipping_method' => 'standard', // Default
    'order_status' => 'pending', // Default
];

$lastId = ShopOrder::insert($order);

## Generate receipt, viewable by agent dashboard
$order_hash = getInvoiceIdFromPaypalResponse($r_decoded);
$amount = getTotalAmountFromPaypalResponse($r_decoded);
$paypal_transaction_id = getTransactionIdFromPaypalResponse($r_decoded);
$email = getEmailFromPaypalResponse($r_decoded);
$paypal_fee = getPaypalFeeFromPaypalResponse($r_decoded);
$net_amount = getNetAmountFromPaypalResponse($r_decoded);

CashierReceipt::insert([
    'email' => $email,
    // 'user_id' => $user_id,
    'amount' => $amount['value'],
    'currency' => $amount['currency_code'],
    'description' => "Shop Order Payment (Order Id: $lastId)",
    'payment_mode' => PAYPAL_MODE,
    'payment_type' => 'Paypal',
    'payment_status' => 'completed',
    'paypal_fee' => $paypal_fee,
    'net_amount' => $net_amount,
    'paypal_invoice_id' => $order_hash,
    'digital_receipt_url' => "https://www.sandbox.paypal.com/activity/payment/" . $paypal_transaction_id
]);

## Clear the Car Rental Session
$shopSession->clearCart();
$shopSession->clearOrderDetails();

## OPTIONAL: SEND CUSTOMER BOOKING CONFIRMATION EMAIL
// Mail::sendOrderConfirmation($customer_data['email'], $order);

## OPTIONAL: SEND PUSHOVER NOTIFCATION FOR NEWLY CAPTURED BOOKINGS
// Pushover::send('IKA: New listing upgrade purchased (sandbox)');

echo $r;

?>