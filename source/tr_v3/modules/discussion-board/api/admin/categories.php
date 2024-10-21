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
 
    $rows = DiscussionBoardCategory::all();

    echo json_encode([
        'message' => 'success',
        'rows' => $rows
       ], true);
}

function handlePut() {

    $jsonData = file_get_contents('php://input');

    $data = json_decode($jsonData, true);

    $id = $data['id'];

    DiscussionBoardCategory::update($id, [
        'name' => $data['name']
    ]);

    echo json_encode([
        'message' => 'success'
       ], true);
}

function handleDelete() {

    $id = $_GET['id'];

    DiscussionBoardCategory::delete($id);

    echo json_encode([
        'message' => 'success'
       ], true);
}

function handlePost() {

    $payload = [
        'name' => $_POST['name']
    ];

    $lastId = DiscussionBoardCategory::insert($payload);

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
            'message' => 'success',
        ], true);
        exit();
}

?>