<?php

/**
 * Submits a post response to Gemini and get a string response from Google's servers
 */


# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Validate Request
// if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
//     Exceptions::throwJsonException('The request type is invalid');
// }

// # Validate Params
// if(!isset($_POST['input_text'])) {
//     Exceptions::throwJsonException('Input text must be provided!');
// }

# Run
$client = Gemini::client(GOOGLE_GEMINI_API_KEY);

// Define prompt here
$prompt = <<<TEXT
Pick a plugin from the following list for this prompt:
Prompt: “What’s the weather like today?”
Plugins:
Sports: Gets info sporting events
Weather: Get the current weather for a region
News: Get recent news on a topic
Just say the plugin name, nothing else
TEXT;

$result = $client->geminiPro()->generateContent($prompt);

$generated_text = $result->text(); // Hello! How can I assist you today?

# Response
echo json_encode([
 'message' => 'success',
 'generated_text' => $generated_text
], true);

?>