<?php

/**
 * This API answers the question: "Which hotels are close to the conference center?"
 * Allows users to search hotels by city
 * See https://developers.amadeus.com/self-service/category/hotels/api-doc/hotel-list/api-reference
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
$apiUrl = 'https://test.api.amadeus.com/v1/reference-data/locations/hotels/by-city';

$city_code = $_POST['keywords']; // E.g NYC

$required_params = [
    'cityCode' => $city_code, // 3 chars IATA Code, See https://www.iata.org/en/publications/directories/code-search/
    'ratings' => 5
];

$results = Curl::get($apiUrl, $required_params, ["Authorization: Bearer $accessToken"]);

# Response
$response = [
    'message' => 'success',
    'results' => json_decode($results)
];

echo json_encode($response);

?>