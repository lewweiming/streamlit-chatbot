<?php

use MiladRahimi\PhpRouter\Router;

$router->group(['prefix' => '/framework/admin','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {

    $router->get('/module-manager', [ModuleManagerController::class, 'admin']);
    $router->get('/module-manager/workflow', [ModuleManagerController::class, 'showWorkflow']);

});

?>