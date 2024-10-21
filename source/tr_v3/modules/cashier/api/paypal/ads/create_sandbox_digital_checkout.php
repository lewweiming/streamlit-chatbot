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

# Run

# Get Incoming Data
$job_id = $_POST['job_id'];

$amount = 1; // Nominal amount

$hash = (string)hexdec(uniqid());

$paypal_payload = [
    'invoice_id' => $hash, // Same as the purchase hash
    'description' => 'This is a digital resource purchase on Cushiejobs',

    'items' => [
        [
            'name' => 'Cushiejobs Digital Resource',
            'description' => "CUSHIEJOBS-EMPLOYERS-JOB-ID-" . $job_id,
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

?>
