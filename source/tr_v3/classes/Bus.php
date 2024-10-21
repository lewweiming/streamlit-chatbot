<?php

use Brick\Event\EventDispatcher;

class Bus
{
    public static $dispatcher; // Dispatcher Instance

    /* EXTEND AS NECESSARY - MAPS EVENT NAMES TO LISTENERS */
    const LISTENERS = [
        'usernameChange' => 'UsernameChangeListener'
    ];

    public static function getDispatcher()
    {
        if (self::$dispatcher === null)
            self::$dispatcher = self::prepareDispatcher();
        return self::$dispatcher;
    }

    /* LOADS ALL LISTENERS */
    public static function prepareDispatcher()
    {
        $dispatcher = new EventDispatcher();

        /* EXTEND WITH LISTENERS */        
        foreach(self::LISTENERS as $key => $val) {

            $dispatcher->addListener($key, function() use ($val) {
                call_user_func_array("$val::run", func_get_args());
            });
        }
        
        return $dispatcher;
    }

    public static function emit($event)
    {
        $d = self::getDispatcher();
        call_user_func_array([$d, 'dispatch'], func_get_args()); // $d->dispatch($event);
    }
}

?>