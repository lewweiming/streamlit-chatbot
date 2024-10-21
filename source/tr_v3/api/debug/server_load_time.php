<?php

// Let's test how long it takes to load the Core classes, controllers and composer functions


// Start time before executing any code
$start_time = microtime(true);

// Your PHP code here...

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
// require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
// error_reporting(E_ALL);
// ini_set('display_errors', 'on');

# Run

# Response

// echo json_encode([
//  'message' => 'success',
//  'rows' => $rows
// ], true);



// End time after executing your code
$end_time = microtime(true);

// Calculate the execution time
$execution_time = $end_time - $start_time;

// Output the execution time
$m = "Page loaded in " . round($execution_time, 4) . " seconds";
echo ($m);

?>