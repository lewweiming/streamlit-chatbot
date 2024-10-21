<?php
/*
VERSION 1.2 (Apr 2024)

Flash messaging compatible with Delight since Odan/Session save() method affects Delight session variables
- $_SESSION['flash_messages'];

Usage:
In Controller:

Flash::add('success', 'Logout successful!');
Flash::save();

In Core:
$this->twig->addGlobal('flash', Flash::all());
Flash::clear();

Format:
Array[
    'success' => [
        ...
    ],
    'error' => [
        Message1,
        Message2
    ]
]

*/
class Flash
{
    public static function all()
    {
        if(isset($_SESSION['flash_messages'])) {
            return $_SESSION['flash_messages'];
        } else {
            return array();
        }
    }

    public static function add($type, $message)
    {
        if( !session_id() ) @session_start();
        $_SESSION['flash_messages'][$type][] = $message;
    }

    public static function save()
    {
        session_write_close();
    }

    public static function clear()
    {
        $_SESSION['flash_messages'] = [];
        $_SESSION['errors'] = [];
    }

    /** VALIDATION ERROR BAG - Based on Validtron */
    public static function validationErrors()
    {
        if(isset($_SESSION['errors'])) {
            return $_SESSION['errors'];
        } else {
            return array();
        }
    }

    // I.e $validtron_error_bag = $v->errors
    public static function setValidationErrors(Array $validtron_error_bag)
    {
        if( !session_id() ) @session_start();
        $_SESSION['errors'] = $validtron_error_bag;
    }
}
?>