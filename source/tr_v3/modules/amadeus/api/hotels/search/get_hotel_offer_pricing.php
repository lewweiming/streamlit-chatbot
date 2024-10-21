<?php

/**
 * This API answers the question: "What is the confirmed hotel pricing before purchase?"
 * Allows users to confirm hotel offer pricing before purchase (necessary step)
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

$offerId = $_POST['offerId']; // E.g New York
$apiUrl = "https://test.api.amadeus.com/v3/shopping/hotel-offers/$offerId";

$required_params = [
    'offerId' => 'TSXOJ6LFQ2', // Unique identifier of an offer. Either the GDS booking code or the aggregator offerId with a limited lifetime.
];

$results = Curl::get($apiUrl, $required_params, ["Authorization: Bearer $accessToken"]);

# Response
$response = [
    'message' => 'success',
    'results' => json_decode($results)
];

echo json_encode($response);

?>