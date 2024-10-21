/*
Config provides module related variables and definitions which can be applied and customised throughout the module.

Module Config

- Accessing config in Controller
- Config can contain arrays and constants and other definitions
- Additional definitions are loaded via include
- Using an array in a config file
- Include the config file

EXAMPLE CONFIG:


$config = array(
    'database' => array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => 'password',
        'database' => 'my_database'
    ),
    'site' => array(
        'name' => 'My Website',
        'url' => 'http://example.com'
    ),
    // Add more sections as needed
);

**USAGE**
// Include the whole config
include $_SERVER['DOCUMENT_ROOT'] . 'modules/moduleName/config.php';

// Only load the database configuration
$databaseConfig = $config['database'];
*/