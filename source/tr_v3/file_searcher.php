<?php

/*
VERSION 0.3 (7 AUG 2022)

Usage:
Query Mode:
http://localhost:8080/file_searcher.php?path=/api&query=keyword

List Mode:
http://localhost:8080/file_searcher.php/list

Simplest Router:
https://www.taniarascia.com/the-simplest-php-router/
*/

namespace KevinLew\PhpFileSearcher {

    define('DOMAIN', 'https://auth.webconxept.com');

    class SearchUtils
    {
        /**
        - Throws an error when api is called in ajax mode
        **/
        public static function throwJsonException($message)
        {
            
            echo json_encode([
                'error'=> true, 
                'message' => $message
            ]);
            
            exit();
        }

        /* Echo a JSON response */
        public static function out($responseData)
        {
            echo json_encode($responseData);
        }

        /* Echos an array of folders at root level specified by the path */
        public static function getFolders()
        {
            $path = $_SERVER['DOCUMENT_ROOT'];

            $folders = array_filter(scandir($path), function($item) use ($path) {
                return is_dir($path . "/{$item}");
            });
        
            $folders = array_diff($folders, array('..', '.'));
        
            $folders = array_values($folders);

            $response = [
                'message' => 'success',
                'folders' => $folders
            ];

            self::out($response);
        }

        /* 
        Executes default behaviour 
        - echo JSON
        */
        public static function executeDefault()
        {
                ## Validate
                if(!isset($_GET['query']) || empty($_GET['query'])) {
                    self::throwJsonException('Keyword must be provided!');
                }

                if(!isset($_GET['path']) || empty($_GET['path'])) {
                    self::throwJsonException('Path must be provided!');
                }

                ## Execute

                $short_path = $_GET['path'];
                $query = $_GET['query'];
                $path = rtrim($_SERVER['DOCUMENT_ROOT'], '/') . $short_path;
                $out = self::search($path, $query);

                $response = [
                    'message' => 'success',
                    'domain' => DOMAIN,
                    'path' => $short_path,
                    'query' => $query,
                    'rows' => $out
                ];

                self::out($response);
        }

        /* Uses recursive grep to search files containing string, high performance */
        public static function search($path, $q)
        {
            $files = [];

            $out = self::php_grep($path, $q); // String
            
            if(strlen($out) > 0) {
                $out = substr_replace($out ,"", -1); // removes the last \n
                $files = explode("\n", $out);
            }

            return $files;
        }

        /* 
        RECURSIVE SEARCH CORE USING GREP 
        - Returns a string of file paths containing keyword in file contents
        */
        public static function php_grep($path, $q)
        {
            $path = rtrim($path, '/');

            $fp = opendir($path);

            while($f = readdir($fp)) {

                if( preg_match("#^\.+$#", $f) ) continue; // ignore symbolic links

                $file_full_path = $path.'/'.$f;

                /* OPTIONALLY EXCLUDE LARGE FILES > 20 KB fOR IMPROVED PERFORMANCE */
                if(is_file($file_full_path) && filesize ( $file_full_path ) > 20000) {
                    continue;
                }

                if(is_dir($file_full_path)) {
                    
                    $out = self::php_grep($file_full_path, $q);

                } else if( stristr(file_get_contents($file_full_path), $q) ) {

                    $out = substr("$file_full_path\n", strlen(rtrim($_SERVER['DOCUMENT_ROOT'], '/'))); // Only get relative path
                }
            }
            
            return $out;
        }

        /* Non-recursive search abstracted from https://alvarotrigo.com/blog/super-fast-search-by-file-content-using-php-windows/ */
        // public static function searchDirectoryIterator($path, $string) {

        //     $dir = new \DirectoryIterator($path);
        //     $files = array();
        
        //     $totalFiles = 0;
        //     $cont = 0;
        //     foreach ($dir as $file){
        //         if (!$file->isDot()){
        //             $content = file_get_contents($file->getPathname());
        //             if (strpos($content, $string) !== false) {
        //                 $files[$file->getMTime()] = $file->getBasename();
        //             }
        //         }
        //     }
        
        //     ksort($files);
        
        //     return array('files' => $files, 'totalFiles' => $cont);
        // }
    }

    /* Simple router that processes the URI to determine behaviour */
    $request = $_SERVER['REQUEST_URI'];

    /* Based on simple auth middleware */
    session_start();
    
    if($_SESSION['is_logged_in'] == false) {

        die('Unauthorized access');
    }

    switch ($request) {

        case '/file_searcher.php/list' :

            SearchUtils::getFolders();
            break;

        default:

            SearchUtils::executeDefault();    
            break;
    }

    
}

?>