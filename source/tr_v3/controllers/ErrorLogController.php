<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ErrorLogController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    
    function showErrorLog() 
    {
        $content = '';

        $path = ERROR_LOG_PATH;

        if(file_exists($path)) {

            $content = file_get_contents($path);
        }

        return $this->twig->render('admin/error-log/index.html', ['content' => $content]);
    }

    function showErrorLogApache() 
    {
        $content = '';

        $path = ERROR_LOG_PATH_APACHE;

        if(file_exists($path)) {

            $content = file_get_contents($path);
        }

        return $this->twig->render('admin/error-log/apache.html', ['content' => $content]);
    }
}
?>