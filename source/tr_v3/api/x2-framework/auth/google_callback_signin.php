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
    header('Location: /login');
}

# If verify token is successful

# If email is in users table, then no need to create account, login user
$auth = Delight::getAuth();
if(User::checkIfUserExistsByEmail($payload['email'])) {
    $auth->admin()->logInAsUserByEmail($payload['email']);
    Flash::add('success', 'Login successful!');
    header('Location: /');
} else {
# If email is not in users table, don't create account, tell user that email is not found and to sign up first!
    Flash::add('success', 'Could not locate your account with the crendentials provided by Google. Please sign up first!');
    header('Location: /login');
}

?>