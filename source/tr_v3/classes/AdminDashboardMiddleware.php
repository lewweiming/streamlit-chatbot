<?php

use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response\RedirectResponse;

class AdminDashboardMiddleware
{
    public function handle(ServerRequestInterface $request, Closure $next)
    {
        $count = (DebuggerMessage::getUnreadCount())->total; // Data needs to be encapsulated into a single object for ease of access

        $t = Twig::getTwig();

        $t->addGlobal('debuggerMessagesCount', $count);
        
        ## Call the next middleware/controller

        return $next($request);
    }
}

?>