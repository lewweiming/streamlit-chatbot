<?php

# Load definitions
$dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'] . '../private_html/config');
$dotenv->safeLoad();
include($_SERVER['DOCUMENT_ROOT'] . "../private_html/config/definitions.php");

# Cookie Domain scope - For subdomain auth
## When enabled, all subdomains will have same PHPSESSID
// ini_set('session.cookie_domain', '.travelgowhere.com.sg');
// ini_set('session.save_path', $_SERVER['DOCUMENT_ROOT'] . '../tmp'); // Must be enabled to prevent error where session file could not load

class Core
{
    /* 
    Based on PSR0 Specs 
    - Autoloaders remove the complexity of including files by mapping namespaces to file system paths.
    */
    public static function autoload ($class)
    {

        $folders = [
            'classes/',
            'controllers/',
            'models/',
            'listeners/'
        ];

        // Looping through each directory to load all the class files. It will only require a file once.
        // If it finds the same class in a directory later on, IT WILL IGNORE IT! Because of that require once!
        foreach( $folders as $folder ) {
        
            $folder = $_SERVER['DOCUMENT_ROOT'] . $folder;

            if (file_exists($folder . $class . '.php')) {

                require_once($folder . $class . '.php');

                return;
            }
        }
    }
}

spl_autoload_register('Core::autoload');

# MODULES
include($_SERVER['DOCUMENT_ROOT'] . "/modules/module-manager/autoloader.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modules/file-searcher/autoloader.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modules/support-tickets/autoloader.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modules/blog/autoloader.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modules/forums/autoloader.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modules/discussion-board/autoloader.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modules/work-orders/autoloader.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modules/email/autoloader.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modules/chatbot/autoloader.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modules/cashier/autoloader.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modules/amadeus/autoloader.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modules/customer-support/autoloader.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modules/tr-car-rentals/autoloader.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modules/tr-flight-bookings/autoloader.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modules/tr-trip-bookings/autoloader.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modules/tr-hotel-bookings/autoloader.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modules/tr-shop/autoloader.php");


?>