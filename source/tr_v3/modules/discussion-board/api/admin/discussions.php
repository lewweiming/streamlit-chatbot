<?php

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Run

function handleList() {
    $rows = DiscussionBoardDiscussion::all(); // Updated to fetch discussions

    echo json_encode([
        'message' => 'success',
        'rows' => $rows
    ], true);
}

function handlePut() {
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);
    $id = $data['id'];

    DiscussionBoardDiscussion::update($id, [
        'category' => $data['category'],
        'subject' => $data['subject'],
        'message' => $data['message']
    ]);

    echo json_encode([
        'message' => 'success'
    ], true);
}

function handleDelete() {
    
    $id = $_GET['id'];
    DiscussionBoardDiscussion::delete($id);
    DiscussionBoardPost::deleteWhere('discussion_id', $id);

    echo json_encode([
        'message' => 'success'
    ], true);
}

function handlePost() {
    $payload = [
        'category' => $_POST['category'],
        'subject' => $_POST['subject'],
        'message' => $_POST['message']
    ];

    $lastId = DiscussionBoardDiscussion::insert($payload);

    echo json_encode([
        'message' => 'success',
        'lastId' => $lastId
    ], true);
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        handleList();
        exit();
    case 'POST':
        handlePost();
        exit();
    case 'PUT':
        handlePut();
        exit();
    case 'DELETE':
        handleDelete();
        exit();
    default:
        echo json_encode([
            'message' => 'error', // Updated for clarity
        ], true);
        exit();
}

?>
