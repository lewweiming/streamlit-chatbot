<?php

# Cookie Domain scope - For subdomain auth
## When enabled, all subdomains will have same PHPSESSID
// ini_set('session.cookie_domain', '.travelgowhere.com.sg');
// ini_set('session.save_path', $_SERVER['DOCUMENT_ROOT'] . '../tmp');

if (session_status() !== PHP_SESSION_ACTIVE) {
    @session_start();
}

if($_SESSION['is_logged_in'] !== true) {
  die('Authorisation required!');
}

# Definitions
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'srxrwayjxu');
define('DB_PASSWORD', 'vbBVX9nAVu');
define('DB_NAME', 'srxrwayjxu');

// function adminer_object() {
  
//   class AdminerSoftware extends Adminer {
    
//     function credentials() {
//       // server, username and password for connecting to database
//       return array(DB_SERVER, DB_USERNAME, DB_PASSWORD);
//     }
    
//     function database() {
//       // database name, will be escaped by Adminer
//       return DB_NAME;
//     }
    
//     function login($login, $password) {
//       // validate user submitted credentials
//       return true;
//     }
    
//   }
  
//   return new AdminerSoftware;
// }

if ($_SERVER['QUERY_STRING'] === '' || empty($_COOKIE['adminer_permanent'])) {
  $_POST['auth'] = [
      'driver'    => 'server',
      'server'    => DB_SERVER,
      'username'  => DB_USERNAME,
      'password'  => DB_PASSWORD,
      'db'        => DB_NAME,
      'permanent' => 1,
  ];
}

include './adminer-4.8.1.php';