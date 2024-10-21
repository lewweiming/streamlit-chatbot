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
if (!isset($_POST['module_title'])) {
    Exceptions::throwJsonException('Module title must be provided!');
}

if (!isset($_POST['module_folder'])) {
    Exceptions::throwJsonException('Module folder must be provided!');
}

if (!isset($_POST['download_path'])) {
    Exceptions::throwJsonException('Download path folder must be provided!');
}

# PARAMS
// module download path, module folder
$module_title = $_POST['module_title'];
$module_folder = $_POST['module_folder'];
$download_path = $_POST['download_path'];

# Additional Functions
function downloadModule($download_path)
{

    ## Create Folder
    ## Save Zip File to Folder
    ## Unzip File
    ## Delete File

    $repoUrl = $download_path; // download_path to be indicated in json, the json file is to be downloaded for a fresh view of available modules
    $zipFile = 'module.zip';

    $ch = curl_init($repoUrl);
    $fp = fopen($zipFile, 'w');

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
}

function unzipModule()
{

    $zipFile = 'module.zip';
    $extractPath = $_SERVER['DOCUMENT_ROOT'] . 'modules';

    ## Create folder
    if (!file_exists($extractPath)) {
        mkdir($extractPath);
        chmod($extractPath, 0775);
    }

    $zip = new ZipArchive;
    if ($zip->open($zipFile) === TRUE) {
        $zip->extractTo($extractPath);
        $zip->close();
        // echo "Extracted to $extractPath\n";
    } else {
        Exceptions::throwJsonException("Aborting..Failed to open $zipFile");
    }
}

function updateTable($module_title, $module_folder)
{
    $module = Module::findWhere('module_title', $module_title);

    if (empty($module)) {
        Module::insert([
            'module_title' => $module_title,
            'module_folder' => $module_folder
        ]);
    }
}

// Mandatory
// Add module entry into core for autoloading
function updateCore($module_folder)
{
    // Define the file path
    $file_path = $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

    // Define the string to search for and the string to append
    $search_string = '# MODULES';
    $append_string = "include(\$_SERVER[\"DOCUMENT_ROOT\"] . '/modules/$module_folder/autoloader.php');";

    if (fileContainsString($file_path, $append_string) == false) {

        appendStrToFile($file_path, $append_string, $search_string);
    }
}

// Check if routes file I.e routes.php exist first in module folder
// If applicable
function updateRoutes($module_folder)
{
    // Define the file path
    $file_path = $_SERVER['DOCUMENT_ROOT'] . 'index.php';

    // Define the string to search for and the string to append
    $search_string = '# MODULES';
    $append_string = "include('./modules/$module_folder/routes.php');";

    if (fileContainsString($file_path, $append_string) == false) {

        appendStrToFile($file_path, $append_string, $search_string);
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


function appendStrToFile($file_path, $append_string, $search_string)
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

    // Insert the new string directly below the found line
    array_splice($file_lines, $line_index + 1, 0, $append_string);

    // Write the modified lines back to the file
    $result = file_put_contents($file_path, implode("\n", $file_lines));

    if ($result === false) {
        Exceptions::throwJsonException('Error writing to file.');
    }

    // Success
    return;
}

// Last step of installation to create DB
function runInstaller($module_folder)
{
    // Check if installer.php exists first
    // Then include the file
    $path = $_SERVER['DOCUMENT_ROOT'] . "modules/$module_folder/installer.php";

    if(!file_exists($path)) {
        Exceptions::throwJsonException("installer.php not found for $module_folder! Aborting..");
    }

    include($path); // Runs additional task set by installer
}

// Looks for a file called module.zip in current folder and delete it
function deleteModuleZip()
{
    if (file_exists('./module.zip')) {
        unlink('./module.zip');
    }
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
downloadModule($download_path); // OK
unzipModule(); // OK
updateRoutes($module_folder); // OK
updateCore($module_folder); // OK
updateTable($module_title, $module_folder); // OK
runInstaller($module_folder); // OK
deleteModuleZip(); // OK

# Response

echo json_encode([
    'message' => 'success',
], true);
