<?php

/**
 * Detects labels from an image using Google's Vision API
 */

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

// # Validate Params
if(!isset($_POST['image_base64'])) {
    Exceptions::throwJsonException('Image must be provided in base64 format!');
}

# Initialize the Vision Client
$client = new Google\Cloud\Vision\V1\ImageAnnotatorClient();

# Get the image data
$image_base64 = $_POST['image_base64'];

# Create the Image Object
$image = new Google\Cloud\Vision\V1\Image();
$image->setContent(base64_decode($image_base64));

# Detect labels
$response = $client->labelDetection($image);
$labels = $response->getLabelAnnotations();

# Prepare label list
$label_list = [];
foreach ($labels as $label) {
    $label_list[] = $label->getDescription();
}

# Response
echo json_encode([
    'message' => 'success',
    'labels' => $label_list
], true);

?>
