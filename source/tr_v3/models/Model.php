<?php

/*
The Basic Model Class which all other models inherit from
See https://stackoverflow.com/questions/28157846/how-to-avoid-passing-database-object-to-each-model-object-without-having-to-use
*/

class Model 
{
    protected static $db;

    protected static $config = DATABASE['local'];

    /* Called once when class is autoloaded */
    static function init()
    {
        static::$db = Database::getPdox(static::$config);
    }

}

Model::init();
?>