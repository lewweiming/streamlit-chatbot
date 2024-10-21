<?php

/**
- An endpoint that checks if a user is logged in using PHP Session
**/

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

## Run
session_start();

$login_status = false;
        
if($_SESSION['is_logged_in'] == true) {

    $login_status = true;
}

# Return JSON response
$response = [
    'message' => 'success',
    'login_status' => $login_status
];

echo json_encode($response);

?>
