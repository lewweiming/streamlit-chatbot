<?php

/*
- Load files from specified folder using scandir
*/

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Run
$path = PUBLIC_ROOT . '/modules/email/views/emails/templates';
$scan = array_diff(scandir($path), array('..', '.'));

$files = [];

foreach($scan as $file)
{
    if(!is_dir(PUBLIC_ROOT . "/modules/email/views/emails/templates/$file"))
    {
        $files[] = $file;
    }
}

# Response

echo json_encode([
 'message' => 'success',
 'files' => array_values($files)
], true);

?>