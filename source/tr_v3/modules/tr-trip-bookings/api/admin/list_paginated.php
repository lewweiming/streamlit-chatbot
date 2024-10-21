<?php

# Definitions
define("TABLE", "trips_trips_v1");
define("ITEMS_PER_PAGE", 12); // DEFAULT 12

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Init Pdox
$db = Database::getPdox();

# Execute
if(isset($_GET['filters'])) {
    
    $filters = json_decode($_GET['filters'], true);
} else {
    $filters = [
        'tags' => null
    ];
}

if(!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = (int) $_GET['page'];
}

$query = $db->table(TABLE);

/* FILTERS START */
// if(!empty($filters['category'])) {
//     $tags = (array) $filters['category'];
//     foreach($tags as $tag) {
//         $query->orFindInSet('tags', $tag); // Find In Set doesn't support multiple tags
//     }
// }

// if(!empty($filters['name'])) {
//     $name = $filters['name'];
//     $query->like('name', "%{$name}%");
// }
/* FILTERS END */

// .. extend filters

$clone_query = clone $query; // Clone query for counting since running get() invalidates the query for subsequent calls

$result = $clone_query->count('id','count')->get();

$rows = $query->pagination(ITEMS_PER_PAGE, $page)->orderBy('id desc')->getAll();

echo json_encode([
    'message' => 'success',
    'count' => $result->count, // Total rows without pagination
    'rows' => $rows
], true);

?>