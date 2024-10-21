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

// function getListingById($listing_id) {

//     $listing = Listing::find($listing_id);

//     return $listing;
// }

# Get Incoming Data
// $listing_id = $_POST['listing_id'];

# Run

$hash = (string)hexdec(uniqid());

// $listing = getListingById($listing_id);

$amount = 3; // FIXED

$paypal_payload = [

    'invoice_id' => $hash, // Same as the purchase hash
    'description' => 'This is a digital resource purchase on Travelgowhere',

    'items' => [
        [
            'name' => 'Travelgowhere Hotel Booking',
            'description' => "TRAVELGOWHERE-HOTEL-BOOKING",
            'quantity' => 1,
            'unit_amount' => [
                'currency_code' => 'USD',
                'value' => round($amount, 2, PHP_ROUND_HALF_UP)
            ]
        ]
    ]
];

$r = PaypalDigitalCheckout::curlCreateSandboxPurchase($paypal_payload, $amount);

echo $r;
