<?php

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Run
Mail::sendTest('socrates3142@gmail.com');

# Response

echo json_encode([
 'message' => 'success',
], true);

?>