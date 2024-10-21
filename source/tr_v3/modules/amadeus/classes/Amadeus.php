<?php

class Amadeus
{
    // Define constants for the API endpoint and credentials
    public const API_OAUTH_URL = 'https://test.api.amadeus.com/v1/security/oauth2/token';
    public const CLIENT_ID = '4H5Ea2ROEmZ9vl3JtTaDgvx68EnaZE81';
    public const CLIENT_SECRET = 'yACoAX2M5zWIzl3u';
    public const OAUTH2_TOKEN_STORAGE_PATH = '/oauth2-tokens/amadeus.json'; // private_html/oauth2-tokens

    /*
    Checks the stored token if it has expired
    - Where $token is a json_encoded OAuth 2 token
    - Accepts the unix time
    */
    public static function tokenHasExpired($token)
    {
        return (time() > $token->expires_by) ? true : false;
    }

    /*
    Returns an existing or fresh token
    */
    public static function getOAuth2Token()
    {
        // Read token:
        $token = self::readToken();

        // Check if expired
        if(self::tokenHasExpired($token)) {

            // Retrieve new one
            $accessToken = self::getOAuthTokenViaCurl();

        } else {

            $accessToken = $token->access_token;
        }

        return $accessToken;
    }



    // Reads the token in /private_html/oauth2-tokens/amadeus.json
    // Returns as json decoded
    public static function readToken()
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . '../private_html/oauth2-tokens/amadeus.json';

        if (file_exists($path)) {

            $contents = file_get_contents($path);
            return json_decode($contents);
        } else {
            return false;
        }
    }

    // Stores token in /private_html/oauth2-tokens/amadeus.json
    public static function storeToken($json_decoded)
    {
        $folder = $_SERVER['DOCUMENT_ROOT'] . '../private_html/oauth2-tokens';

        if (!is_dir($folder)) {
            mkdir($folder);
        }

        $path = $_SERVER['DOCUMENT_ROOT'] . '../private_html/oauth2-tokens/amadeus.json';

        file_put_contents($path, json_encode($json_decoded));
    }

    public static function getOAuthTokenViaCurl()
    {

        $clientId = Amadeus::CLIENT_ID;
        $clientSecret = Amadeus::CLIENT_SECRET;

        // Prepare data for the token request
        $data = [
            'grant_type' => 'client_credentials',
            'client_id' => self::CLIENT_ID,
            'client_secret' => self::CLIENT_SECRET
        ];

        // Prepare cURL request to obtain access token
        $response = Curl::post(self::API_OAUTH_URL, $data);

        // Decode the JSON response
        $tokenData = json_decode($response, true);
        
        // Append extra data
        $tokenData['expires_by'] = time() + $tokenData['expires_in'];

        // Extract access token
        $accessToken = $tokenData['access_token'];

        // Store Token for future retrieval
        self::storeToken($tokenData);

        return $accessToken;
    }
}
