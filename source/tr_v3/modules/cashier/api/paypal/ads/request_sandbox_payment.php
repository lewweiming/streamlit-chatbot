<?php

/*
- Request a sandbox captured payment
- Assumes Oauth 2 Token is available (see the cron script)
- See https://developer.paypal.com/docs/api/payments/v2/
*/

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Execute
$authorizationId = $_GET['authorizationId'];
$r = Paypal::curlRequestSandboxPayment($authorizationId);

echo $r;

?>
