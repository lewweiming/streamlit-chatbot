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

if(!isset($_POST['title'])) {
    Exceptions::throwJsonException('Title must be provided!');
}

if(!isset($_POST['markdown_content'])) {
    Exceptions::throwJsonException('Markdown content must be provided!');
}

// if(!isset($_POST['website'])) {
//     Exceptions::throwJsonException('Website must be provided!');
// }

// if($_POST['website'] == 'null') {
//     $_POST['website'] = '';
// }

# Run
$payload['title'] = $_POST['title'];
$payload['markdown_content'] = $_POST['markdown_content'];
$id = $_POST['id'];
X2FArticle::update($id, $payload);

# Response

echo json_encode([
 'message' => 'success'
], true);

?>