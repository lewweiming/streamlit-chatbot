<?php

/**
 * This API answers the question: "What are the best tours and activities in this location?"
 * The Tours and Activities API helps you search and book activities, sightseeing tours, days trips, and museum tickets in many places around the world.
 * See https://developers.amadeus.com/self-service/category/destination-experiences/api-doc/tours-and-activities
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
$activityId = $_POST['id'];
$apiUrl = "https://test.api.amadeus.com/v1/shopping/activities/$activityId";

$results = Curl::get($apiUrl, [], ["Authorization: Bearer $accessToken"]);

# Response
$response = [
    'message' => 'success',
    'results' => json_decode($results)
];

echo json_encode($response);

?>