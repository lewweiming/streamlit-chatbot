<?php

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

# Validate Params
if(!isset($_POST['module_title'])) {
    Exceptions::throwJsonException('Module title must be provided!');
}

if(!isset($_POST['module_folder'])) {
    Exceptions::throwJsonException('Module folder must be provided!');
}

if(!isset($_POST['download_path'])) {
    Exceptions::throwJsonException('Download path folder must be provided!');
}

# PARAMS
// module download path, module folder
$module_title = $_POST['module_title'];
$module_folder = $_POST['module_folder'];
$download_path = $_POST['download_path'];

function updateTable($module_title)
{
    $module = Module::findWhere('module_title', $module_title);

    if (!empty($module)) {
        Module::delete($module->id);
    }
}

// Mandatory
// Add module entry into core for autoloading
function updateCore($module_folder)
{
    $file_path = $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';
    $search_string = "include(\$_SERVER[\"DOCUMENT_ROOT\"] . '/modules/$module_folder/autoloader.php');";

    if(fileContainsString($file_path, $search_string)) {

        removeLineFromFile($file_path, $search_string);
    }
}

// Check if routes file I.e routes.php exist first in module folder
// If applicable
function updateRoutes($module_folder)
{
    // In index.php
    // Check if the line already exists first, if not append
    // include('./modules/blog/routes.php');

    // Define the file path
    $file_path = $_SERVER['DOCUMENT_ROOT'] . 'index.php';
    $search_string = "include('./modules/$module_folder/routes.php');";

    if(fileContainsString($file_path, $search_string)) {

        removeLineFromFile($file_path, $search_string);
    }
}


function fileContainsString($file_path, $search_string)
{
    // Read the entire file into a string
    $file_contents = file_get_contents($file_path);

    if ($file_contents === false) {
        Exceptions::throwJsonException("Error reading file. Cannot locate $file_path");
    }

    // Check if the search string is found in the file contents
    if (strpos($file_contents, $search_string) !== false) {
        return true;  // String found
    } else {
        return false; // String not found
    }
}

function removeLineFromFile($file_path, $search_string)
{
    // Read the file contents into an array of lines
    $file_lines = file($file_path, FILE_IGNORE_NEW_LINES);

    if ($file_lines === false) {
        Exceptions::throwJsonException("Error updating core. Cannot locate $file_path");
    }

    // Find the index of the line containing the search string
    $line_index = -1;
    foreach ($file_lines as $index => $line) {
        if (strpos($line, $search_string) !== false) {
            $line_index = $index;
            break;
        }
    }

    if ($line_index == -1) {
        Exceptions::throwJsonException('Search string not found in file.');
    }

    // Remove the line containing the search string
    array_splice($file_lines, $line_index, 1);

    // Write the modified lines back to the file
    $result = file_put_contents($file_path, implode("\n", $file_lines));

    if ($result === false) {
        Exceptions::throwJsonException('Error writing to file.');
    }

    // Success
    return;
}

function removeModule($module_folder)
{
    $path = $_SERVER['DOCUMENT_ROOT'] . 'modules/' . $module_folder;

    if(file_exists(($path))) {

        removeDirectory($path);

    } else {
        Exceptions::throwJsonException("Module path not found: $module_folder! Aborting..");
    }

}

function removeDirectory($path) {

	$files = glob($path . '/*');
	foreach ($files as $file) {
		is_dir($file) ? removeDirectory($file) : unlink($file);
	}
    
    if(file_exists($path)) {
      rmdir($path);
    }

	return;
}

// Uninstall tasks
function runUninstaller($module_folder)
{
    $path = $_SERVER['DOCUMENT_ROOT'] . "modules/$module_folder/uninstaller.php";

    if(!file_exists($path)) {
        Exceptions::throwJsonException("uninstaller.php not found for $module_folder! Aborting..");
    }

    include($path); // Runs additional task set by installer
}

# Validate Request
// if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
//     Exceptions::throwJsonException('The request type is invalid');
// }

// # Validate Params
// if(!isset($_POST['name'])) {
//     Exceptions::throwJsonException('Recipient name must be provided!');
// }

# Run
runUninstaller($module_folder); // OK
updateRoutes($module_folder); // OK
updateCore($module_folder); // OK
updateTable($module_title); // OK
removeModule($module_folder); // OK

# Response

echo json_encode([
 'message' => 'success',
], true);
