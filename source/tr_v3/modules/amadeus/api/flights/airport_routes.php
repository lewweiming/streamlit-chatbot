<?php

/**
 * See https://developers.amadeus.com/self-service/category/flights/api-doc/flight-offers-search/api-reference
 */

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Validate Request
// if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
//     Exceptions::throwJsonException('The request type is invalid');
// }

# Validate Params
// if(!isset($_POST['name'])) {
//     Exceptions::throwJsonException('Recipient name must be provided!');
// }

# Get OAuth2 Token
$accessToken = Amadeus::getOAuth2Token();

// Example API endpoint
$apiUrl = 'https://test.api.amadeus.com/v1/airport/direct-destinations';

$required_params = [
    'departureAirportCode' => 'SIN', // IATA code
    'max' => 300 // Max destinations to return
];

$results = Curl::get($apiUrl, $required_params, ["Authorization: Bearer $accessToken"]);

# Response
$response = [
    'message' => 'success',
    'results' => json_decode($results)
];

echo json_encode($response);

?>