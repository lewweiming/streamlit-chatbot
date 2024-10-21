<?php

/**
 * This API is the final step in the flight booking flow. Use it after completing a flight search with Flight Offers Search and confirming real-time price and availability with Flight Offers Price.
 * When the flight is successfully booked, the Amadeus Flight Create Orders API will return a summary of the booking along with a booking ID and a booking reference number (PNR).
 * See https://developers.amadeus.com/self-service/category/flights/api-doc/flight-create-orders
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
$apiUrl = 'https://test.api.amadeus.com/v1/booking/flight-orders';


// Flight offers are obtained from the flight-offers-search api
$flight_offers = $_POST['flightOffers'];
$travellers = $_POST['travellers'];
$json_payload_encoded = <<<TEXT
{
  "data": {
    "type": "flight-order",
    "flightOffers": $flight_offers,
    "travelers": $travellers
  }
}
TEXT;

// $json_payload_encoded = <<<TEXT
// {
//   "data": {
//     "type": "flight-order",
//     "flightOffers": [
//       {
//           "type": "flight-offer",
//           "id": "1",
//           "source": "GDS",
//           "instantTicketingRequired": false,
//           "nonHomogeneous": false,
//           "paymentCardRequired": false,
//           "lastTicketingDate": "2024-07-26",
//           "itineraries": [
//             {
//               "segments": [
//                 {
//                   "departure": {
//                     "iataCode": "SIN",
//                     "terminal": "1",
//                     "at": "2024-07-31T15:25:00"
//                   },
//                   "arrival": {
//                     "iataCode": "BKK",
//                     "at": "2024-07-31T16:45:00"
//                   },
//                   "carrierCode": "TR",
//                   "number": "610",
//                   "aircraft": {
//                     "code": "789"
//                   },
//                   "operating": {
//                     "carrierCode": "TR"
//                   },
//                   "duration": "PT2H20M",
//                   "id": "1",
//                   "numberOfStops": 0,
//                   "co2Emissions": [
//                     {
//                       "weight": 93,
//                       "weightUnit": "KG",
//                       "cabin": "ECONOMY"
//                     }
//                   ]
//                 }
//               ]
//             }
//           ],
//           "price": {
//             "currency": "EUR",
//             "total": "237.74",
//             "base": "104.00",
//             "fees": [
//               {
//                 "amount": "0.00",
//                 "type": "SUPPLIER"
//               },
//               {
//                 "amount": "0.00",
//                 "type": "TICKETING"
//               },
//               {
//                 "amount": "0.00",
//                 "type": "FORM_OF_PAYMENT"
//               }
//             ],
//             "grandTotal": "237.74",
//             "billingCurrency": "EUR"
//           },
//           "pricingOptions": {
//             "fareType": [
//               "PUBLISHED"
//             ],
//             "includedCheckedBagsOnly": true
//           },
//           "validatingAirlineCodes": [
//             "HR"
//           ],
//           "travelerPricings": [
//             {
//               "travelerId": "1",
//               "fareOption": "STANDARD",
//               "travelerType": "ADULT",
//               "price": {
//                 "currency": "EUR",
//                 "total": "118.87",
//                 "base": "52.00",
//                 "taxes": [
//                   {
//                     "amount": "5.46",
//                     "code": "OP"
//                   },
//                   {
//                     "amount": "0.39",
//                     "code": "G8"
//                   },
//                   {
//                     "amount": "0.89",
//                     "code": "E7"
//                   },
//                   {
//                     "amount": "31.68",
//                     "code": "SG"
//                   },
//                   {
//                     "amount": "21.07",
//                     "code": "YR"
//                   },
//                   {
//                     "amount": "7.38",
//                     "code": "L7"
//                   }
//                 ],
//                 "refundableTaxes": "45.80"
//               },
//               "fareDetailsBySegment": [
//                 {
//                   "segmentId": "1",
//                   "cabin": "ECONOMY",
//                   "fareBasis": "O2TR24",
//                   "class": "O",
//                   "includedCheckedBags": {
//                     "weight": 30,
//                     "weightUnit": "KG"
//                   }
//                 }
//               ]
//             },
//             {
//               "travelerId": "2",
//               "fareOption": "STANDARD",
//               "travelerType": "ADULT",
//               "price": {
//                 "currency": "EUR",
//                 "total": "118.87",
//                 "base": "52.00",
//                 "taxes": [
//                   {
//                     "amount": "5.46",
//                     "code": "OP"
//                   },
//                   {
//                     "amount": "0.39",
//                     "code": "G8"
//                   },
//                   {
//                     "amount": "0.89",
//                     "code": "E7"
//                   },
//                   {
//                     "amount": "31.68",
//                     "code": "SG"
//                   },
//                   {
//                     "amount": "21.07",
//                     "code": "YR"
//                   },
//                   {
//                     "amount": "7.38",
//                     "code": "L7"
//                   }
//                 ],
//                 "refundableTaxes": "45.80"
//               },
//               "fareDetailsBySegment": [
//                 {
//                   "segmentId": "1",
//                   "cabin": "ECONOMY",
//                   "fareBasis": "O2TR24",
//                   "class": "O",
//                   "includedCheckedBags": {
//                     "weight": 30,
//                     "weightUnit": "KG"
//                   }
//                 }
//               ]
//             }
//           ]
//         }
//     ],
//     "travelers": [
//       {
//         "id": "1",
//         "dateOfBirth": "1982-01-16",
//         "name": {
//           "firstName": "JORGE",
//           "lastName": "GONZALES"
//         },
//         "gender": "MALE",
//         "contact": {
//           "emailAddress": "jorge.gonzales833@telefonica.es",
//           "phones": [
//             {
//               "deviceType": "MOBILE",
//               "countryCallingCode": "34",
//               "number": "480080076"
//             }
//           ]
//         },
//         "documents": [
//           {
//             "documentType": "PASSPORT",
//             "birthPlace": "Madrid",
//             "issuanceLocation": "Madrid",
//             "issuanceDate": "2015-04-14",
//             "number": "00000000",
//             "expiryDate": "2025-04-14",
//             "issuanceCountry": "ES",
//             "validityCountry": "ES",
//             "nationality": "ES",
//             "holder": true
//           }
//         ]
//       },
//       {
//         "id": "2",
//         "dateOfBirth": "2012-10-11",
//         "gender": "FEMALE",
//         "contact": {
//           "emailAddress": "jorge.gonzales833@telefonica.es",
//           "phones": [
//             {
//               "deviceType": "MOBILE",
//               "countryCallingCode": "34",
//               "number": "480080076"
//             }
//           ]
//         },
//         "name": {
//           "firstName": "ADRIANA",
//           "lastName": "GONZALES"
//         }
//       }
//     ],
//     "remarks": {
//       "general": [
//         {
//           "subType": "GENERAL_MISCELLANEOUS",
//           "text": "ONLINE BOOKING FROM INCREIBLE VIAJES"
//         }
//       ]
//     },
//     "ticketingAgreement": {
//       "option": "DELAY_TO_CANCEL",
//       "delay": "6D"
//     },
//     "contacts": [
//       {
//         "addresseeName": {
//           "firstName": "PABLO",
//           "lastName": "RODRIGUEZ"
//         },
//         "companyName": "INCREIBLE VIAJES",
//         "purpose": "STANDARD",
//         "phones": [
//           {
//             "deviceType": "LANDLINE",
//             "countryCallingCode": "34",
//             "number": "480080071"
//           },
//           {
//             "deviceType": "MOBILE",
//             "countryCallingCode": "33",
//             "number": "480080072"
//           }
//         ],
//         "emailAddress": "support@increibleviajes.es",
//         "address": {
//           "lines": [
//             "Calle Prado, 16"
//           ],
//           "postalCode": "28014",
//           "cityName": "Madrid",
//           "countryCode": "ES"
//         }
//       }
//     ]
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