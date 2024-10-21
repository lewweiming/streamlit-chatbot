<?php

/**
 * This API answers the question: "What are the best hotel deals during my trip?"
 * Allows users to get hotel offers which can be purchased
 * See https://developers.amadeus.com/self-service/category/hotels/api-doc/hotel-search/api-reference
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
$apiUrl = 'https://test.api.amadeus.com/v3/shopping/hotel-offers';

$hotelCode = $_POST['hotel_code']; // E.g MCLONGHM

$required_params = [
    'hotelIds' => $hotelCode, // Amadeus property codes on 8 chars. Mandatory parameter for a search by predefined list of hotels.
];

$results = Curl::get($apiUrl, $required_params, ["Authorization: Bearer $accessToken"]);

# Response
$response = [
    'message' => 'success',
    'results' => json_decode($results)
];

echo json_encode($response);

?>