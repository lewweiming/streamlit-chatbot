<?php

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

// # Validate Params
// if(!isset($_POST['name'])) {
//     Exceptions::throwJsonException('Recipient name must be provided!');
// }

# Get Id Token
$id_token = $_POST['credential'];

# Verify Token
try {

    $client = new Google_Client(['client_id' => GOOGLE_CLIENT_ID]);
    $payload = $client->verifyIdToken($id_token);

} catch (Google_Exception $e) {
    // Handle error
    // echo "Error verifying ID token: " . $e->getMessage() . "\n";
    # If verify token is not successful...return to login page with alert message
    Flash::add('error', 'Failed to verify token');
    header('Location: /register');
}

# If verify token is successful

# If email is in users table, then 
$auth = Delight::getAuth();
if(User::checkIfUserExistsByEmail($payload['email'])) {
    Flash::add('success', 'User already exists! Please login instead!');
    header('Location: /login');
} else {
    ## If email is not in users table, proceed to create a Google account
    $random_password = Delight::generateRandomPassword();

    // Keep generating a unique username
    do {
        $random_username = Delight::generateUsername();
        try {
            $auth->registerWithUniqueUsername($payload['email'], $random_password, $random_username);
            // If registration is successful, break out of the loop
            break;
        } catch (\Delight\Auth\DuplicateUsernameException $e) {
            // If the username is not unique, continue the loop to generate a new one
        }
    } while (true);
    
    
    ## Auto login
    $auth->login($payload['email'], $random_password);
    Flash::add('success', 'New account created! You are now logged in as: ' . $random_username);
    header('Location: /');
}

?>