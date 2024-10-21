<?php

/*
Example usage:
echo Curl::get('https://api.example.com/data', ['param1' => 'value1'], ['Accept: application/json']);

Example usage:
echo Curl::get('https://api.example.com/data', ['param1' => 'value1'], ['Accept: application/json']);
echo Curl::post('https://api.example.com/submit', ['field1' => 'value1'], ['Content-Type: application/x-www-form-urlencoded']);
echo Curl::postJson('https://api.example.com/submit', $json_encoded_str, ['Content-Type: application/json']);
*/

class Curl
{
    public static function get($url, $params = [], $headers = [])
    {
        $ch = curl_init();
        $queryString = http_build_query($params);
        $fullUrl = $url . '?' . $queryString;

        curl_setopt($ch, CURLOPT_URL, $fullUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }

        curl_close($ch);

        if (isset($error_msg)) {
            return $error_msg;
        }

        return $response;
    }

    public static function post($url, $params = [], $headers = [])
    {
        $ch = curl_init();
        $postData = http_build_query($params);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }

        curl_close($ch);

        if (isset($error_msg)) {
            return $error_msg;
        }

        return $response;
    }

    public static function postJson($url, $jsonData, $headers = [])
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }

        curl_close($ch);

        if (isset($error_msg)) {
            return $error_msg;
        }

        return $response;
    }

}

?>