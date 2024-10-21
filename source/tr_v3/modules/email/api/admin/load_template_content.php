<?php

/*
- Load file content
*/

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Validate
if(!isset($_GET['filename'])) {
    Exceptions::throwJsonException("Filename needs to be provided!");
}

# Run
$filename = $_GET['filename'];
$path = PUBLIC_ROOT . '/modules/email/views/emails/templates/' . $filename;

if(!file_exists($path)) {
    Exceptions::throwJsonException("File: $filename does not exist!");
}

$content = file_get_contents($path);

# Response
echo json_encode([
 'message' => 'success',
 'content' => $content
], true);

?>