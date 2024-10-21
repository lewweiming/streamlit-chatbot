<?php

trait ExceptionsTrait
{
    /**
    - Throws an error when api is called in ajax mode
    **/
    public function throwJsonException($message) 
    {
        
        echo json_encode([
            'error'=> true, 
            'message' => $message
        ]);
        
        exit();
    }

    public function throwJsonValidationException($message, $errors = array()) 
    {
        
        echo json_encode([
            'error'=> true, 
            'message' => $message,
            'errors' => $errors
        ]);
        
        exit();
    }
}

?>