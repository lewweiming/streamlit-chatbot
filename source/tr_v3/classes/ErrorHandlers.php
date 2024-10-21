<?php

class ErrorHandlers {

    // This error handler connects to the pusher app: https://dev.webconxept.com/apps/real-time-error-log/
    // Usage initPusherErrorHandler();
    // When set, error messages are re-routed to Pusher App
    public static function initPusherErrorHandler() {

         # CUSTOM FUNCTIONS
        function customErrorHandler($errno, $errstr, $errfile, $errline) {

            $errorData = [
                'errno' => $errno,
                'errstr' => $errstr,
                'errfile' => $errfile,
                'errline' => $errline,
            ];

            // CUSTOM WORKFLOW

            // Trigger Pusher event
            Pusher::send(json_encode($errorData), 'new-error', 'php-errors');

        }

        // Set custom error handler
        set_error_handler('customErrorHandler');
    }

}