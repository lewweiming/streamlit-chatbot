<?php

/*
- Receives files from X2F Repository for plugin installation
- Receiver must also receive the path to install file to
*/

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Init Params
if(!isset($_POST['install_path'])) {

    Exceptions::throwJsonException("Install path not specified!");
}

$install_path = $_SERVER['DOCUMENT_ROOT'] . $_POST['install_path'];

# Run
if(!file_exists($install_path)) {

    Exceptions::throwJsonException("Install path not found!: $install_path");
}

if(isset($_FILES['file'])) {
    
    $filename = $_FILES['file']['name'];
    $path = $install_path . "$filename";
    move_uploaded_file($_FILES['file']['tmp_name'], $path);
}

# Response

echo json_encode([
'message' => 'success',
], true);

?>