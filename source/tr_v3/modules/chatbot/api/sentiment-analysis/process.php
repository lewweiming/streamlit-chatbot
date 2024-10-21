<?php

/**
 * Analyzes the sentiment of a given text using Google's NLP API
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
if(!isset($_POST['input_text'])) {
    Exceptions::throwJsonException('Input text must be provided!');
}

# Initialize the NLP Client
$client = new Google\Cloud\Language\V1\LanguageServiceClient();

# Get the input text
$input_text = $_POST['input_text'];

# Create the Document for analysis
$document = new Google\Cloud\Language\V1\Document();
$document->setContent($input_text);
$document->setType(Google\Cloud\Language\V1\Document\Type::PLAIN_TEXT);

# Analyze Sentiment
$response = $client->analyzeSentiment($document);
$sentiment = $response->getDocumentSentiment();

# Response
echo json_encode([
    'message' => 'success',
    'sentiment_score' => $sentiment->getScore(),  // Score between -1.0 (negative) and 1.0 (positive)
    'sentiment_magnitude' => $sentiment->getMagnitude()  // Magnitude of the sentiment
], true);

?>
