<?php

class Exceptions
{
    /**
    - Throws an error when api is called in ajax mode
    **/
    public static function throwJsonException($message) {
        
        echo json_encode([
            'error'=> true, 
            'message' => $message
        ]);
        
        exit();
    }

    public static function throwJsonValidationException($message, $errors = array()) {
        
        echo json_encode([
            'error'=> true, 
            'message' => $message,
            'errors' => $errors
        ]);
        
        exit();
    }
}