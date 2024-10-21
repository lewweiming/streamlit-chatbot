<?php
/*
- The Pusher class
*/
class Pusher
{
  public static function send($message)
  {
    $PUSHER_APP_ID = PUSHER_APP_ID;
    $PUSHER_APP_KEY = PUSHER_APP_KEY;

    $domain = "https://api-ap1.pusher.com/apps/$PUSHER_APP_ID/events";

    $data_message = [
      'message' => $message
    ];

    $data_message = json_encode($data_message);

    $data = [
      'data' => $data_message,
      'name' => 'my-event',
      'channel' => 'my-channel'
    ];

    $payload = json_encode($data); // data must be json encoded

    $ch = curl_init();
    // set our url with curl_setopt() 
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, ""); // CONVERTS BINARY TO HTML

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'content-type: application/json'
    ));

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    ## Get Params
    $timestamp = time();
    $body_md5 = md5($payload);
    $signature_string = "POST\n/apps/$PUSHER_APP_ID/events\nauth_key=$PUSHER_APP_KEY&auth_timestamp=$timestamp&auth_version=1.0&body_md5=$body_md5";
    $signature = hash_hmac('sha256', $signature_string, PUSHER_APP_SECRET);

    $params = [
      'body_md5' => $body_md5,
      'auth_version' => '1.0',
      'auth_key' => PUSHER_APP_KEY,
      'auth_timestamp' => $timestamp,
      'auth_signature' => $signature
    ];
    $url = $domain . '?' . http_build_query($params);
    curl_setopt($ch, CURLOPT_URL, $url);


    $res = curl_exec($ch);
    curl_close($ch);

    return $res;
  }
}