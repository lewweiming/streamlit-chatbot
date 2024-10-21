<?php

/**
 * This API answers the question: "Which cities and airports begin with Lon..?"
 * Find out which cities travellers frequent most
 * See https://developers.amadeus.com/self-service/category/market-insights/api-doc/flight-most-booked-destinations/api-reference
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

// GET API endpoint
$apiUrl = 'https://test.api.amadeus.com/v1/travel/analytics/air-traffic/booked';

// $keywords = $_POST['keywords']; // E.g New York

$required_params = [
    'originCityCode' => 'MAD', // Code for the origin city following IATA standard (IATA table codes). - e.g. BOS for Boston
    'period' => '2017-06' // period when consumers are traveling.
];

$results = Curl::get($apiUrl, $required_params, ["Authorization: Bearer $accessToken"]);

# Response
$response = [
    'message' => 'success',
    'results' => json_decode($results)
];

echo json_encode($response);

?>