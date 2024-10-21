<?php

/**
 * This api assists in creating a hotel booking
 * Create a hotel booking
 * See https://developers.amadeus.com/self-service/category/hotels/api-doc/hotel-booking/api-reference
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
$apiUrl = 'https://test.api.amadeus.com/v2/booking/hotel-orders';

// Flight offers are obtained from the flight-offers-search api
$hotelOfferId = $_POST['hotel_offer_id'];
// $travellers = $_POST['travellers'];
$json_payload_encoded = <<<TEXT
{
  "data": {
    "type": "hotel-order",
    "guests": [
      {
        "tid": 1,
        "title": "MR",
        "firstName": "BOB",
        "lastName": "SMITH",
        "phone": "+33679278416",
        "email": "bob.smith@email.com"
      }
    ],
    "travelAgent": {
      "contact": {
        "email": "bob.smith@email.com"
      }
    },
    "roomAssociations": [
      {
        "guestReferences": [
          {
            "guestReference": "1"
          }
        ],
        "hotelOfferId": $hotelOfferId
      }
    ],
    "payment": {
      "method": "CREDIT_CARD",
      "paymentCard": {
        "paymentCardInfo": {
          "vendorCode": "VI",
          "cardNumber": "4151289722471370",
          "expiryDate": "2026-08",
          "holderName": "BOB SMITH"
        }
      }
    }
  }
}
TEXT;

// $json_payload_encoded = <<<TEXT
// {
//   "data": {
//     "type": "hotel-order",
//     "guests": [
//       {
//         "tid": 1,
//         "title": "MR",
//         "firstName": "BOB",
//         "lastName": "SMITH",
//         "phone": "+33679278416",
//         "email": "bob.smith@email.com"
//       }
//     ],
//     "travelAgent": {
//       "contact": {
//         "email": "bob.smith@email.com"
//       }
//     },
//     "roomAssociations": [
//       {
//         "guestReferences": [
//           {
//             "guestReference": "1"
//           }
//         ],
//         "hotelOfferId": "4L8PRJPEN7"
//       }
//     ],
//     "payment": {
//       "method": "CREDIT_CARD",
//       "paymentCard": {
//         "paymentCardInfo": {
//           "vendorCode": "VI",
//           "cardNumber": "4151289722471370",
//           "expiryDate": "2026-08",
//           "holderName": "BOB SMITH"
//         }
//       }
//     }
//   }
// }
// TEXT;

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