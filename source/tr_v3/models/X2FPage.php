<?php

class X2FPage extends Model
{
    public static function all()
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . "views/pages";
        $files = array_values(array_diff(scandir($path), array('..', '.')));

        return $files;
    }

    /* Creates a file */
    public static function insert($filename)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . "views/pages/$filename";

        if(!file_exists($path)) {

            file_put_contents($path, '');
        }

        return;
    }

    public static function getFilePath($filename)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . "views/pages/$filename";

        return $path;
    }

    public static function delete($filename)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . "views/pages/$filename";

        if(file_exists($path)) {
            unlink($path);
        }
    }
}

?>