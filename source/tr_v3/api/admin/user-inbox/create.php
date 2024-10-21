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
if(!isset($_POST['username']) || empty($_POST['username'])) {
    Exceptions::throwJsonException('Username must be provided!');
}

if(!isset($_POST['title']) || empty($_POST['title'])) {
    Exceptions::throwJsonException('Title must be provided!');
}

if(!isset($_POST['markdown_content'])) {
    Exceptions::throwJsonException('Markdown content must be provided!');
}

# Validate username
$user = User::findByUsername($_POST['username']);
if(empty($user)) {
    Exceptions::throwJsonException('User not found!');
}

# Run
$payload = [
    'user_id' => $user->id,
    'title' => $_POST['title'],
    'markdown_content' => $_POST['markdown_content']
];
$lastId = UserInboxMessage::insert($payload);

# Response
echo json_encode([
 'message' => 'success',
 'lastId' => $lastId
], true);

?>