<?php

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Validate
if(!isset($_GET['user_id'])) {
    Exceptions::throwJsonException('User id must be provided!');
}

# Run
$user_id = $_GET['user_id'];

$auth = Delight::getAuth();

try {
    $auth->admin()->logInAsUserById($user_id);
}

catch (\Delight\Auth\UnknownIdException $e) {
    die('Unknown ID');
}
catch (\Delight\Auth\EmailNotVerifiedException $e) {
    die('Email address not verified');
}

# Response
echo json_encode([
 'message' => 'success',
], true);

?>