<?php

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Run

## Check premium listings, if listing has expired mark as non-premium
$db = Database::getPdox();

$db->query('UPDATE listings SET is_premium = 0 WHERE premium_expires_on <= NOW()')->exec();

?>

