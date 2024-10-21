<?php

/**
 * SeatMap Display API allows you to get information to display airplane cabin plan from a Flight Offer in order for the traveler to be able to choose his seat during the flight booking flow thanks to POST method. In addition GET method allows you to display airplane cabin plan from an existing Flight Order. 
 * 
 * Related to Flight Offer
 * 
 * This API answers the question: "How can I see the available seats on the flight and pick the one I want?
 * See https://developers.amadeus.com/self-service/category/flights/api-doc/seatmap-display
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
$apiUrl = 'https://test.api.amadeus.com/v1/shopping/seatmaps';

$required_params = [
    'originLocationCode' => 'SIN', // IATA code
    'destinationLocationCode' => 'BKK', // IATA code
    'departureDate' => '2024-07-31', // E.g 2023-05-02
    'adults' => 2,
    'max' => 5
];

$results = Curl::get($apiUrl, $required_params, ["Authorization: Bearer $accessToken"]);

# Response
$response = [
    'message' => 'success',
    'results' => json_decode($results)
];

echo json_encode($response);

?>