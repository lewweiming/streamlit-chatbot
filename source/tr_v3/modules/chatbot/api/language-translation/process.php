<?php

/**
 * Translates a given text into the target language using Google's Translation API
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
if(!isset($_POST['input_text']) || !isset($_POST['target_language'])) {
    Exceptions::throwJsonException('Input text and target language must be provided!');
}

# Initialize the Translation Client
$client = new Google\Cloud\Translate\V2\TranslateClient([
    'key' => GOOGLE_TRANSLATE_API_KEY
]);

# Get the input text and target language
$input_text = $_POST['input_text'];
$target_language = $_POST['target_language'];

# Translate text
$translation = $client->translate($input_text, [
    'target' => $target_language
]);

# Response
echo json_encode([
    'message' => 'success',
    'translated_text' => $translation['text']
], true);

?>
