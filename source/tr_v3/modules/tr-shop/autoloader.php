<?php

// Class must have a unique name to prevent clashes

class ModuleShop
{
    public static function autoload ($class) {

        $folders = [
            'classes/',
            'controllers/',
            'models/'
        ];

        // Looping through each directory to load all the class files. It will only require a file once.
        // If it finds the same class in a directory later on, IT WILL IGNORE IT! Because of that require once!
        foreach( $folders as $folder ) {

            $folder = __DIR__ . '/' . $folder;

            if (file_exists($folder . $class . '.php')) {

                require_once($folder . $class . '.php');

                return;
            }
        }
    }
}

spl_autoload_register('ModuleShop::autoload');

?>