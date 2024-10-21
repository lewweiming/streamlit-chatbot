<?php

use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response\RedirectResponse;

/*
- Check if the user with super admin is logged in via delight
*/
class UserAccountMiddleware
{
    public function handle(ServerRequestInterface $request, Closure $next)
    {
        $url_login = '/login' . '?page=' . $request->getUri()->getPath();

        if(Delight::isAuthenticated() == false || !(Delight::isUser())) {

            return new RedirectResponse($url_login);
        }
        
        ## Call the next middleware/controller

        return $next($request);
    }
}

?>