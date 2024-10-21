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

class Paypal
{
    /*
    Checks the stored token if it has expired
    - Accepts the unix time
    */
    public static function tokenHasExpired($expires_by)
    {
        return (time() > $expires_by) ? true : false;
    }

    /*
    Retrieves the OAuth 2 Token that Paypal has provided and stored in /private_html/oauth2-tokens/paypal.json
    */
    public static function getOAuth2SandboxToken()
    {
        $obj = null;

        if (file_exists(PAYPAL_OAUTH2_SANDBOX_TOKEN_STORAGE_PATH)) {

            $obj = json_decode(file_get_contents(PAYPAL_OAUTH2_SANDBOX_TOKEN_STORAGE_PATH));
        }

        if ($obj == null || self::tokenHasExpired($obj->expires_by)) {

            $obj = self::newOAuth2SandboxToken();
        }

        return $obj->access_token;
    }

    /*
    Retrieves the OAuth 2 Token that Paypal has provided and stored in /private_html/oauth2-tokens/paypal.json
    */
    public static function getOAuth2LiveToken()
    {
        $obj = null;

        if (file_exists(PAYPAL_OAUTH2_LIVE_TOKEN_STORAGE_PATH)) {

            $obj = json_decode(file_get_contents(PAYPAL_OAUTH2_LIVE_TOKEN_STORAGE_PATH));
        }

        if ($obj == null || self::tokenHasExpired($obj->expires_by)) {

            $obj = self::newOAuth2LiveToken();
        }

        return $obj->access_token;
    }

    /*
    Makes a call to Paypal's server to retrieve a new OAuth2 Token
    - Stores results in /private_html/oauth2-tokens/paypal.json
    */
    public static function newOAuth2SandboxToken()
    {
        // create & initialize a curl session 
        $curl = curl_init();
        // set our url with curl_setopt() 
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
        curl_setopt($curl, CURLOPT_URL, "https://api-m.sandbox.paypal.com/v1/oauth2/token");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_USERPWD, PAYPAL_SANBOX_CLIENT_ID . ":" . PAYPAL_SANBOX_CLIENT_SECRET);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ["Content-Type: application/x-www-form-urlencoded"]);
        // curl_exec() executes the started curl session and $output contains the output string 
        $curl_response = curl_exec($curl);
        // close curl resource to free up system resources and (deletes the variable made by curl_init) 
        curl_close($curl);

        ## Add new property "expires_by" (to be used for checking token expiration)
        $r = json_decode($curl_response);
        $r->expires_by = time() + (int) $r->expires_in;

        $modified_response = json_encode($r, JSON_UNESCAPED_SLASHES);

        ## Store as file
        file_put_contents(PAYPAL_OAUTH2_SANDBOX_TOKEN_STORAGE_PATH, $modified_response);

        return $r;
    }

    /*
    Makes a call to Paypal's server to retrieve a new OAuth2 Token
    - Stores results in /private_html/oauth2-tokens/paypal.json
    */
    public static function newOAuth2LiveToken()
    {
        // create & initialize a curl session 
        $curl = curl_init();
        // set our url with curl_setopt() 
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
        curl_setopt($curl, CURLOPT_URL, "https://api-m.paypal.com/v1/oauth2/token");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_USERPWD, PAYPAL_LIVE_CLIENT_ID . ":" . PAYPAL_LIVE_CLIENT_SECRET);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ["Content-Type: application/x-www-form-urlencoded"]);
        // curl_exec() executes the started curl session and $output contains the output string 
        $curl_response = curl_exec($curl);
        // close curl resource to free up system resources and (deletes the variable made by curl_init) 
        curl_close($curl);

        ## Add new property "expires_by" (to be used for checking token expiration)
        $r = json_decode($curl_response);
        $r->expires_by = time() + (int) $r->expires_in;

        $modified_response = json_encode($r, JSON_UNESCAPED_SLASHES);

        ## Store as file
        file_put_contents(PAYPAL_OAUTH2_LIVE_TOKEN_STORAGE_PATH, $modified_response);

        return $r;
    }


    /*
    - Use the Payments Core Resource Rest Api
    - Shows captured payment details
    - See https://developer.paypal.com/docs/api/payments/v2/
    - GET Request
    */
    public static function curlRequestSandboxPayment($authorizationId)
    {
        $oauth2_token = self::getOAuth2SandboxToken();

        // create & initialize a curl session 
        $curl = curl_init();
        // set our url with curl_setopt() 
        curl_setopt($curl, CURLOPT_URL, "https://api-m.sandbox.paypal.com/v2/payments/captures/{$authorizationId}");
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
    - Use the Payments Core Resource Rest Api
    - Shows captured payment details
    - See https://developer.paypal.com/docs/api/payments/v2/
    - GET Request
    */
    public static function curlRequestLivePayment($authorizationId)
    {
        $oauth2_token = self::getOAuth2LiveToken();

        // create & initialize a curl session 
        $curl = curl_init();
        // set our url with curl_setopt() 
        curl_setopt($curl, CURLOPT_URL, "https://api-m.paypal.com/v2/payments/captures/{$authorizationId}");
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
