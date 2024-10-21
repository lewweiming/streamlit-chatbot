<?php

/**
 * Test send an email using a TWIG template
 * Uses PHPMailer
 */

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Validate
if(isset($_GET['template']) && !empty($_GET['template'])) {

    $template = $_GET['template'];

} else {

    $template = 'debug_test';
}

# Run
Mail::sendTestTemplate($template);

# Response

echo json_encode([
 'message' => 'success'
], true);

?>