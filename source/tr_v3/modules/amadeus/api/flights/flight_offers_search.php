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
$apiUrl = 'https://test.api.amadeus.com/v2/shopping/flight-offers';

$required_params = [
    'originLocationCode' => $_POST['originLocationCode'], // IATA code
    'destinationLocationCode' => $_POST['destinationLocationCode'], // IATA code
    'departureDate' => $_POST['departureDate'], // E.g 2023-05-02
    'adults' => (int) $_POST['adults'],
    'max' => (int) $_POST['max']
];

// $required_params = [
//     'originLocationCode' => 'SIN', // IATA code
//     'destinationLocationCode' => 'BKK', // IATA code
//     'departureDate' => '2024-07-31', // E.g 2023-05-02
//     'adults' => 2,
//     'max' => 5
// ];

$results = Curl::get($apiUrl, $required_params, ["Authorization: Bearer $accessToken"]);

# Response
$response = [
    'message' => 'success',
    'results' => json_decode($results)
];

echo json_encode($response);

?>