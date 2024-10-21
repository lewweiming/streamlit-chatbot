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
$shipping_address = [
    'first_name' => 'Peter',
    'last_name' => 'Parker',
    "address" => 'Pasir Ris',
    "apartment" => 'Line 2',
    "postal_code" => '123456',
    "country_code" => 'SG'
];

$amount = 20;

$r = Paypal::curlCreateSandboxOrder($shipping_address, $amount);

echo $r;

?>
