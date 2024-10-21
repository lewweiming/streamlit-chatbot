<?php
/*
- The Debug class
*/
class Debug
{
    /* Print variable to log file */
    public static function p($data)
    {
        error_log(print_r($data, true), 3, ERROR_LOG_PATH);
    }

    /* 
    Adds entry to debugger 
    debug_info - json stringified array/object
    title - Custom title
    source - the origin filename / custom source
    */
    public static function m($debug_info, String $title = 'Debugger', $source = '')
    {
        if(empty($source)) {
            $source = str_replace($_SERVER['DOCUMENT_ROOT'],'',$_SERVER["SCRIPT_FILENAME"]);
        }

        $debug_info = json_encode($debug_info);
        
        DebuggerMessage::insert([
            'title' => $title,
            'debug_info' => $debug_info,
            'source' => $source
        ]);
    }

    
}

?>