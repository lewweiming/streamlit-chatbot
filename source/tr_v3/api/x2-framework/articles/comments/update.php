<?php

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Validate Request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    Exceptions::throwJsonException('The request type is invalid');
}

# Validate Params
if(!isset($_POST['id'])) {
    Exceptions::throwJsonException('Id must be provided!');
}

if(!isset($_POST['name'])) {
    Exceptions::throwJsonException('Name must be provided!');
}

if(!isset($_POST['comment_body'])) {
    Exceptions::throwJsonException('Comment body must be provided!');
}

if($_POST['comment_body'] == 'null') {
    $_POST['comment_body'] = '';
}

# Run
$payload['name'] = $_POST['name'];
$payload['comment_body'] = $_POST['comment_body'];
$id = $_POST['id'];
X2FArticleComment::update($id, $payload);

# Response

echo json_encode([
 'message' => 'success'
], true);

?>