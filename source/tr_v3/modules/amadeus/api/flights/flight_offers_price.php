<?php

/**
 * POST
 * 
 * This API answers the question: "What's the final price for this flight?"
 * 
 * The price and availability of airfare fluctuate constantly, so it's necessary to confirm the real-time price before proceeding to book.
 * 
 * See https://developers.amadeus.com/self-service/category/flights/api-doc/flight-offers-price
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
$apiUrl = 'https://test.api.amadeus.com/v1/shopping/flight-offers/pricing';

// Flight offers are obtained from the flight-offers-search api
$flight_offer = $_POST['flightOffer'];
$json_payload_encoded = <<<TEXT
{
    "data": {
        "type": "flight-offers-pricing",
        "flightOffers": [$flight_offer]
    }
}
TEXT;

// $json_payload_encoded = <<<TEXT
// {
//   "data": {
//     "type": "flight-offers-pricing",
//     "flightOffers": [
//     {
//       "type": "flight-offer",
//       "id": "1",
//       "source": "GDS",
//       "instantTicketingRequired": false,
//       "nonHomogeneous": false,
//       "oneWay": false,
//       "isUpsellOffer": false,
//       "lastTicketingDate": "2024-07-26",
//       "lastTicketingDateTime": "2024-07-26",
//       "numberOfBookableSeats": 9,
//       "itineraries": [
//         {
//           "duration": "PT2H20M",
//           "segments": [
//             {
//               "departure": {
//                 "iataCode": "SIN",
//                 "terminal": "1",
//                 "at": "2024-07-31T15:25:00"
//               },
//               "arrival": {
//                 "iataCode": "BKK",
//                 "at": "2024-07-31T16:45:00"
//               },
//               "carrierCode": "TR",
//               "number": "610",
//               "aircraft": {
//                 "code": "789"
//               },
//               "operating": {
//                 "carrierCode": "TR"
//               },
//               "duration": "PT2H20M",
//               "id": "1",
//               "numberOfStops": 0,
//               "blacklistedInEU": false
//             }
//           ]
//         }
//       ],
//       "price": {
//         "currency": "EUR",
//         "total": "237.74",
//         "base": "104.00",
//         "fees": [
//           {
//             "amount": "0.00",
//             "type": "SUPPLIER"
//           },
//           {
//             "amount": "0.00",
//             "type": "TICKETING"
//           }
//         ],
//         "grandTotal": "237.74"
//       },
//       "pricingOptions": {
//         "fareType": [
//           "PUBLISHED"
//         ],
//         "includedCheckedBagsOnly": true
//       },
//       "validatingAirlineCodes": [
//         "HR"
//       ],
//       "travelerPricings": [
//         {
//           "travelerId": "1",
//           "fareOption": "STANDARD",
//           "travelerType": "ADULT",
//           "price": {
//             "currency": "EUR",
//             "total": "118.87",
//             "base": "52.00"
//           },
//           "fareDetailsBySegment": [
//             {
//               "segmentId": "1",
//               "cabin": "ECONOMY",
//               "fareBasis": "O2TR24",
//               "class": "O",
//               "includedCheckedBags": {
//                 "weight": 30,
//                 "weightUnit": "KG"
//               }
//             }
//           ]
//         },
//         {
//           "travelerId": "2",
//           "fareOption": "STANDARD",
//           "travelerType": "ADULT",
//           "price": {
//             "currency": "EUR",
//             "total": "118.87",
//             "base": "52.00"
//           },
//           "fareDetailsBySegment": [
//             {
//               "segmentId": "1",
//               "cabin": "ECONOMY",
//               "fareBasis": "O2TR24",
//               "class": "O",
//               "includedCheckedBags": {
//                 "weight": 30,
//                 "weightUnit": "KG"
//               }
//             }
//           ]
//         }
//       ]
//     }
//     ]
//   }
// }
// TEXT;

$results = Curl::postJson($apiUrl, $json_payload_encoded, [
    "Authorization: Bearer $accessToken",
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json_payload_encoded)
]);

// d($results);

# Response
$response = [
    'message' => 'success',
    'results' => json_decode($results)
];

echo json_encode($response);

?>