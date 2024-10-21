<?php

/*
- Delete template by filename
*/

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Validate
if(!isset($_POST['filename'])) {
    Exceptions::throwJsonException('Filename must be provided!');
}

# Run
$filename = $_POST['filename'];
$path = $_SERVER['DOCUMENT_ROOT'] . 'modules/email/views/emails/templates/' . $filename;

if(file_exists($path)) {
    unlink($path);
}

# Response

echo json_encode([
 'message' => 'success'
], true);

?>