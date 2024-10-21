<?php

/*
- Save and overwrite
- Save as new
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

if(!isset($_POST['content'])) {
    Exceptions::throwJsonException('Content must be provided!');
}

# Run
$filename = $_POST['filename'];
$content = $_POST['content'];
$path = $_SERVER['DOCUMENT_ROOT'] . 'modules/email/views/emails/templates/' . $filename;

$overwrite = false;
if(file_exists($path)) {
    $overwrite = true;
}

file_put_contents($path, $content);

# Response

echo json_encode([
 'message' => 'success',
 'overwrite' => $overwrite
], true);

?>