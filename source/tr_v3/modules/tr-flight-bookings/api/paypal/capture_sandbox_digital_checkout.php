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
    $departureDate = $booking_data['departureDate'];
    $returnDate = $booking_data['returnDate'];
    $travelClass = $booking_data['flightClass'];
    $insurance = true;
    $luggage = true;
    
    // Passed to View Layer
    $duration = FlightBookingCostCalculator::calculateFlightDuration($departureDate, $returnDate);
    $totalCost = FlightBookingCostCalculator::calculateTotalCost($travelClass, $duration, $insurance, $luggage);

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
$flightBookingSession = new FlightBookingSessionManager();
$booking_data = $flightBookingSession->getBooking(1);

// Example array from session manager
// departureCity => string (10) "losangeles"
// arrivalCity => string (6) "sydney"
// departureDate => string (10) "2024-10-15"
// returnDate => string (10) "2024-10-19"
// passengers => string (1) "1"
// flightClass => string (7) "economy"
// directFlight => string (5) "false"
// flexibleDates => string (5) "false"
// name => string (10) "John Smith"
// email => string (22) "socrates3142@gmail.com"
// phone => string (7) "2343423"

$booking = [
    'booking_ref' => FlightBooking::getNewBookingReference(), // A short 7 character alpha numeric code in CAPS
    'customer_name' => $booking_data['name'],
    'customer_email' => $booking_data['email'],
    'customer_phone' => $booking_data['phone'],
    'user_id' => null,
    'flight_id' => 1,
    'departure_city' => $booking_data['departureCity'],
    'arrival_city' => $booking_data['arrivalCity'],
    'departure_date' => $booking_data['departureDate'],
    'return_date' => $booking_data['returnDate'],
    'passengers' => $booking_data['passengers'],
    'seat_class' => $booking_data['flightClass'],
    'direct_flight' => $booking_data['directFlight'] == 'true'?1:0, // addon
    'flexible_dates' => $booking_data['flexibleDates'] == 'true'?1:0, // addon
    'status' => 'pending', // Default
    'total_amount' => getBookingTotal($booking_data) // 100.00
];

$lastId = HotelBooking::insert($booking);

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
    'description' => "Flight Booking Payment (Booking Id: $lastId)",
    'payment_mode' => PAYPAL_MODE,
    'payment_type' => 'Paypal',
    'payment_status' => 'completed',
    'paypal_fee' => $paypal_fee,
    'net_amount' => $net_amount,
    'paypal_invoice_id' => $order_hash,
    'digital_receipt_url' => "https://www.sandbox.paypal.com/activity/payment/" . $paypal_transaction_id
]);

## Clear the Flight Booking Session
$flightBookingSession->clearBookings();

## OPTIONAL: SEND CUSTOMER BOOKING CONFIRMATION EMAIL
// Mail::sendOrderConfirmation($customer_data['email'], $order);

## OPTIONAL: SEND PUSHOVER NOTIFCATION FOR NEWLY CAPTURED BOOKINGS
// Pushover::send('IKA: New listing upgrade purchased (sandbox)');

echo $r;

?>