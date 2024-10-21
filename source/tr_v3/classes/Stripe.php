<?php
/*
- This class is used to handle Stripe
- Interfaces with the Payment Model
*/
class Stripe
{
    public static $stripe; // The Stripe Client Object

    /*
    - Sets the key
    - If mode isn't explicitly provided, the mode will be based on the config STRIPE_MODE
    */
    public static function init($mode = null)
    {
        if(!$mode) {
            $mode = STRIPE_MODE;
        }

        if($mode == 'test') {
        
            $key = STRIPE_TEST_SECRET_KEY;
            
        } else {
            
            $key = STRIPE_LIVE_SECRET_KEY;
        }
            
        // \Stripe\Stripe::setApiKey($key);

        $stripe = new \Stripe\StripeClient($key);

        self::$stripe = $stripe;

        return $stripe;
    }

    /* Creates a test token for testing purposes, this token can then passed into a charge function such as testCharge */
    public static function createTestToken()
    {
        \Stripe\Stripe::setApiKey(STRIPE_TEST_SECRET_KEY);

        $token = \Stripe\Token::create(array(
          "card" => array(
            "number" => "4242424242424242",
            "exp_month" => 1,
            "exp_year" => 2023,
            "cvc" => "314"
          )
        ));      
        
        return $token;
    }

    public static function charge($amount, $token)
    {
        $stripe = self::init();
        
        try {

            $r = $stripe->charges->create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $token
            ]);

            // $charge = \Stripe\Charge::create([
            //     'amount' => $amount,
            //     'currency' => 'usd',
            //     'source' => $token
            // ]);    
    
        } catch(\Stripe\Error\Card $e) {
    
              // Since it's a decline, \Stripe\Error\Card will be caught
              $body = $e->getJsonBody();
              $cardErrors = $body['error'];
        }
    
        $data = [
            'charge_id' => $r->id
        ];

        $data['success'] = empty($cardErrors)?true:false;
    
        return $data;
    }

    /*
    - Retrieve details of a stripe charge
    - See https://stripe.com/docs/api/charges/retrieve?lang=php
    */
    public static function retrieveCharge($mode, $chargeId)
    {
        $stripe = self::init($mode);

        $r = $stripe->charges->retrieve($chargeId,[]);

        return $r;
    }
}

?>