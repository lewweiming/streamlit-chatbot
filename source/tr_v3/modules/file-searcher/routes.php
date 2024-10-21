<?php

use MiladRahimi\PhpRouter\Router;

$router->group(['prefix' => '/framework/admin','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {

    $router->get('/file-searcher', [ModuleFileSearcherController::class, 'admin']);

});

?>