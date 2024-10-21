<?php

use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response\RedirectResponse;

class SimpleAuthMiddleware
{
    public function handle(ServerRequestInterface $request, Closure $next)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            @session_start();
        }
        
        if($_SESSION['is_logged_in'] == false) {

            return new RedirectResponse('/framework/login');
        }
        
        ## Call the next middleware/controller

        return $next($request);
    }
}

?>