<?php

/*
Uses late static bindings from extended class
*/

class ModelDB
{
    protected static $db;

    protected static $dbArray = []; // Array of DB objects

    protected static $config = DATABASE['local'];

    /* Called once when class is autoloaded */
    static function init()
    {
        static::$db = Database::getPdox(static::$config);
    }

    static function initWithKey($key)
    {
        static::$dbArray[$key] = Database::getPdoxInstance($key, static::$config);
    }

}
?>