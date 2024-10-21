<?php

/*
Based on https://github.com/peppeocchi/php-cron-scheduler
- Cloudways automatically triggers this script every 5 minutes!
*/

# Definitions
define('PATH_CRON_JOBS', $_SERVER['DOCUMENT_ROOT'] . 'cron-jobs/');

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Init
use GO\Scheduler;

// Create a new scheduler
$scheduler = new Scheduler();

// ... configure the scheduled jobs (see below) ...
// $scheduler->php(PATH_CRON_JOBS . 'Test.php')->everyMinute();
$scheduler->php(PATH_CRON_JOBS . 'UpdateListings.php')->daily();

// Let the scheduler execute jobs which are due.
$scheduler->run();

?>