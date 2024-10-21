<?php

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Validate Request
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    Exceptions::throwJsonException('The request type is invalid');
}

# Validate Params
// if(!isset($_POST['name'])) {
//     Exceptions::throwJsonException('Recipient name must be provided!');
// }

# Run
$rows = X2FArticleComment::all();

# Response

echo json_encode([
 'message' => 'success',
 'rows' => $rows
], true);

?>