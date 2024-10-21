<?php

use MiladRahimi\PhpRouter\Router;

$router->group(['prefix' => '/framework/admin','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {

    $router->get('/email/send', [EmailController::class, 'adminSendShow']);
    $router->post('/email/send', [EmailController::class, 'adminSendPost']);
    $router->get('/email/debug', [EmailController::class, 'adminDebugShow']);
    $router->get('/email/templates', [EmailController::class, 'adminTemplatesShow']);


});

?>