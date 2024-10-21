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
function getBookingTotal($booking_data) {

    // Get data from session for use in calculator
    $pickupDate = $booking_data['pickupDate'];
    $returnDate = $booking_data['returnDate'];
    $carType = $booking_data['carType'];
    $insurance = $booking_data['insurance'];
    $gps = $booking_data['gps'];

    $duration = CarRentalCostCalculator::calculateRentalDuration($pickupDate, $returnDate);
    $totalCost = CarRentalCostCalculator::calculateTotalCost($carType, $duration, $insurance, $gps);

    return $totalCost;
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
$carRentalSession = new CarRentalSessionManager();
$booking_data = $carRentalSession->getBooking(1);

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

$booking = [
    'booking_ref' => CarRentalsBooking::getNewBookingReference(), // A short 7 character alpha numeric code in CAPS
    'customer_name' => $booking_data['name'],
    'customer_email' => $booking_data['email'],
    'customer_phone' => $booking_data['phone'],
    'user_id' => null,
    'car_id' => 1,
    'car_type' => $booking_data['carType'],
    'insurance' => $booking_data['insurance'] == 'true'?1:0, // addon
    'gps' => $booking_data['gps'] == 'true'?1:0, // addon
    'start_date' => $booking_data['pickupDate'],
    'end_date' => $booking_data['returnDate'],
    'pickup_location' => $booking_data['pickupLocation'],
    'return_location' => $booking_data['returnLocation'],
    'status' => 'pending', // Default
    'total_amount' => getBookingTotal($booking_data) // 100.00
];

$lastId = CarRentalsBooking::insert($booking);

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
    'description' => "Car Rental Booking Payment (Booking Id: $lastId)",
    'payment_mode' => PAYPAL_MODE,
    'payment_type' => 'Paypal',
    'payment_status' => 'completed',
    'paypal_fee' => $paypal_fee,
    'net_amount' => $net_amount,
    'paypal_invoice_id' => $order_hash,
    'digital_receipt_url' => "https://www.sandbox.paypal.com/activity/payment/" . $paypal_transaction_id
]);

## Clear the Car Rental Session
$carRentalSession->clearBookings();

## OPTIONAL: SEND CUSTOMER BOOKING CONFIRMATION EMAIL
// Mail::sendOrderConfirmation($customer_data['email'], $order);

## OPTIONAL: SEND PUSHOVER NOTIFCATION FOR NEWLY CAPTURED BOOKINGS
// Pushover::send('IKA: New listing upgrade purchased (sandbox)');

echo $r;

?>