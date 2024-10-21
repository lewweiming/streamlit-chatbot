<?php

/**
 * This api allows users to search for car transfers
 * Search for available transfers
 * See https://developers.amadeus.com/self-service/category/cars-and-transfers/api-doc/transfer-search/api-reference
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

// POST API endpoint
$apiUrl = 'https://test.api.amadeus.com/v1/shopping/transfer-offers';


// Flight offers are obtained from the flight-offers-search api
// $flight_offers = $_POST['flightOffers'];
// $travellers = $_POST['travellers'];
// $json_payload_encoded = <<<TEXT
// {
//   "data": {
//     "type": "flight-order",
//     "flightOffers": $flight_offers,
//     "travelers": $travellers
//   }
// }
// TEXT;

$json_payload_encoded = <<<TEXT
{
  "startLocationCode": "CDG",
  "endAddressLine": "Avenue Anatole France, 5",
  "endCityName": "Paris",
  "endZipCode": "75007",
  "endCountryCode": "FR",
  "endName": "Souvenirs De La Tour",
  "endGeoCode": "48.859466,2.2976965",
  "transferType": "PRIVATE",
  "startDateTime": "2024-09-30T10:30:00",
  "passengers": 2,
  "stopOvers": [
    {
      "duration": "PT2H30M",
      "sequenceNumber": 1,
      "addressLine": "Avenue de la Bourdonnais, 19",
      "countryCode": "FR",
      "cityName": "Paris",
      "zipCode": "75007",
      "name": "De La Tours",
      "geoCode": "48.859477,2.2976985",
      "stateCode": "FR"
    }
  ],
  "startConnectedSegment": {
    "transportationType": "FLIGHT",
    "transportationNumber": "AF380",
    "departure": {
      "localDateTime": "2024-04-10T09:00:00",
      "iataCode": "NCE"
    },
    "arrival": {
      "localDateTime": "2024-04-10T10:00:00",
      "iataCode": "CDG"
    }
  },
  "passengerCharacteristics": [
    {
      "passengerTypeCode": "ADT",
      "age": 20
    },
    {
      "passengerTypeCode": "CHD",
      "age": 10
    }
  ]
}
TEXT;

$results = Curl::postJson($apiUrl, $json_payload_encoded, [
    "Authorization: Bearer $accessToken",
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json_payload_encoded)
]);

# Response
$response = [
    'message' => 'success',
    'results' => json_decode($results)
];

echo json_encode($response);

?>