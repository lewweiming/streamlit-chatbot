<?php

/*
Refer to https://github.com/paypal-examples/docs-examples/tree/main/standard-integration

Methods:
- tokenHasExpired
- getOAuth2SandboxToken
- newOAuth2Token
- curlCreateSandboxOrder
- curlCaptureSandboxOrder
*/

class PaypalDigitalCheckout extends Paypal
{
   
    /*
    Use the "Order" core resource, create new order
    - POST request
    - Amount in dollars
    - Returns a json response containing the Paypal Order Id (I.e 7F712809V40491714)

    Payload Format (anything missing will throw error):
    $paypal_payload = [
        'invoice_id' => '123' // Your invoice ID
        'items' => []
    ]


    Shipping Address Format (anything missing will throw error):  
    $shipping_address = [
        'first_name' => 'Peter',
        'last_name' => 'Parker',
        "address" => 'Pasir Ris',
        "apartment" => 'Apartment',
        "postal_code" => '123456',
        "country_code" => 'SG'
    ];

    {
        "intent": "CAPTURE",
        "purchase_units": [
            {
                "amount": {
                    "currency_code": "USD",
                    "value": "100.00"
                }
            }
        ]
    }
    */
    public static function curlCreateSandboxPurchase($paypal_payload, $amount = 0)
    {

        $oauth2_token = parent::getOAuth2SandboxToken();

        $content = [
            "intent" => 'CAPTURE',
            "application_context" => [
                "shipping_preference" => 'NO_SHIPPING' // NO_SHIPPING / SET_PROVIDED_ADDRESS
            ],
            "purchase_units" => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => round($amount, 2, PHP_ROUND_HALF_UP),
                        // The breakdown of the amount. Breakdown provides details such as total item amount, total tax amount, shipping, handling, insurance, and discounts, if any.
                        'breakdown' => [
                            'item_total' => [
                                'currency_code' => 'USD',
                                'value' => round($amount, 2, PHP_ROUND_HALF_UP)
                            ],
                            // 'tax_total' => [
                            //     'currency_code' => 'USD',
                            //     'value' => round(3.00, 2, PHP_ROUND_HALF_UP)
                            // ]
                        ]
                    ],
                    'items' => $paypal_payload['items'],
                    // You can add more items to the 'items' array for multiple products
                    // ...

                    // Add order details or notes
                    'description' => $paypal_payload['description'],
                    'invoice_id' => $paypal_payload['invoice_id'], // Your invoice ID
                    // 'custom_id' => '7890',    // Custom ID for tracking purposes
                    'soft_descriptor' => PAYPAL_DESCRIPTOR
                ]
            ]
        ];

        $json_content = json_encode($content);

        // create & initialize a curl session 
        $curl = curl_init();
        // set our url with curl_setopt() 
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_content);
        curl_setopt($curl, CURLOPT_URL, "https://api-m.sandbox.paypal.com/v2/checkout/orders");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Bearer {$oauth2_token}"
        ]);
        // curl_exec() executes the started curl session and $output contains the output string 
        $curl_response = curl_exec($curl);
        // close curl resource to free up system resources and (deletes the variable made by curl_init) 
        curl_close($curl);

        return $curl_response;
    }

    /*
    Use the "Order" core resource, create new order
    - POST request
    - Amount in dollars
    - Returns a json response containing the Paypal Order Id (I.e 7F712809V40491714)

    Shipping Address Format (anything missing will throw error): 
    $shipping_address = [
        'first_name' => 'Peter',
        'last_name' => 'Parker',
        "address" => 'Pasir Ris',
        "apartment" => 'Apartment',
        "postal_code" => '123456',
        "country_code" => 'SG'
    ];

    {
        "intent": "CAPTURE",
        "purchase_units": [
            {
                "amount": {
                    "currency_code": "USD",
                    "value": "100.00"
                }
            }
        ]
    }
    */
    public static function curlCreateLivePurchase($paypal_payload, $amount = 0)
    {
        $oauth2_token = parent::getOAuth2LiveToken();

        $content = [
            "intent" => 'CAPTURE',
            "application_context" => [
                "shipping_preference" => 'NO_SHIPPING' // NO_SHIPPING / SET_PROVIDED_ADDRESS
            ],
            "purchase_units" => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => round($amount, 2, PHP_ROUND_HALF_UP),
                        // The breakdown of the amount. Breakdown provides details such as total item amount, total tax amount, shipping, handling, insurance, and discounts, if any.
                        'breakdown' => [
                            'item_total' => [
                                'currency_code' => 'USD',
                                'value' => round($amount, 2, PHP_ROUND_HALF_UP)
                            ],
                            // 'tax_total' => [
                            //     'currency_code' => 'USD',
                            //     'value' => round(3.00, 2, PHP_ROUND_HALF_UP)
                            // ]
                        ]
                    ],
                    'items' => $paypal_payload['items'],
                    // You can add more items to the 'items' array for multiple products
                    // ...

                    // Add order details or notes
                    'description' => $paypal_payload['description'],
                    'invoice_id' => $paypal_payload['invoice_id'], // Your invoice ID
                    // 'custom_id' => '7890',    // Custom ID for tracking purposes
                    'soft_descriptor' => PAYPAL_DESCRIPTOR
                ]
            ]
        ];

        $json_content = json_encode($content);

        // create & initialize a curl session 
        $curl = curl_init();
        // set our url with curl_setopt() 
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_content);
        curl_setopt($curl, CURLOPT_URL, "https://api-m.paypal.com/v2/checkout/orders");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Bearer {$oauth2_token}"
        ]);
        // curl_exec() executes the started curl session and $output contains the output string 
        $curl_response = curl_exec($curl);
        // close curl resource to free up system resources and (deletes the variable made by curl_init) 
        curl_close($curl);

        return $curl_response;
    }

    /*
    Use the "Order" core resource, capture order payment
    - POST Request
    - Returns a json response
    */
    public static function curlCaptureSandboxPurchase($orderId)
    {
        $oauth2_token = parent::getOAuth2SandboxToken();

        // create & initialize a curl session 
        $curl = curl_init();
        // set our url with curl_setopt() 
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_URL, "https://api-m.sandbox.paypal.com/v2/checkout/orders/{$orderId}/capture");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Bearer {$oauth2_token}"
        ]);
        // curl_exec() executes the started curl session and $output contains the output string 
        $curl_response = curl_exec($curl);
        // close curl resource to free up system resources and (deletes the variable made by curl_init) 
        curl_close($curl);

        return $curl_response;
    }

    /*
    Use the "Order" core resource, capture order payment
    - POST Request
    - Returns a json response
    */
    public static function curlCaptureLivePurchase($orderId)
    {
        $oauth2_token = parent::getOAuth2LiveToken();

        // create & initialize a curl session 
        $curl = curl_init();
        // set our url with curl_setopt() 
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_URL, "https://api-m.paypal.com/v2/checkout/orders/{$orderId}/capture");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Bearer {$oauth2_token}"
        ]);
        // curl_exec() executes the started curl session and $output contains the output string 
        $curl_response = curl_exec($curl);
        // close curl resource to free up system resources and (deletes the variable made by curl_init) 
        curl_close($curl);

        return $curl_response;
    }
}
