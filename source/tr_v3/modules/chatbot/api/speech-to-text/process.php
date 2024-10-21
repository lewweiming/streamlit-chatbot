<?php

/**
 * Converts an audio file (base64 encoded) to text using Google's Speech-to-Text API
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
if(!isset($_POST['audio_base64'])) {
    Exceptions::throwJsonException('Audio file must be provided in base64 format!');
}

# Initialize the Speech Client
$client = new Google\Cloud\Speech\V1\SpeechClient();

# Get the audio data
$audio_base64 = $_POST['audio_base64'];

# Create the Audio Config and Audio file
$audio = (new Google\Cloud\Speech\V1\RecognitionAudio())
    ->setContent(base64_decode($audio_base64));

$config = (new Google\Cloud\Speech\V1\RecognitionConfig())
    ->setEncoding(Google\Cloud\Speech\V1\RecognitionConfig\AudioEncoding::LINEAR16)
    ->setSampleRateHertz(16000)
    ->setLanguageCode('en-US');

# Recognize the speech
$response = $client->recognize($config, $audio);

# Get the transcript
$transcript = '';
foreach ($response->getResults() as $result) {
    $transcript .= $result->getAlternatives()[0]->getTranscript() . ' ';
}

# Response
echo json_encode([
    'message' => 'success',
    'transcript' => trim($transcript)
], true);

?>
