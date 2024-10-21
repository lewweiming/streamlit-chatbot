<?php

use MiladRahimi\PhpRouter\Router;

$router->get('/work-orders', [ModuleWorkOrdersController::class, 'index']);
$router->get('/work-order/{id}/preview', [ModuleWorkOrdersController::class, 'preview']);

$router->group(['prefix' => '/framework/admin','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {

    $router->get('/work-orders', [ModuleWorkOrdersController::class, 'adminIndex']);
    $router->get('/work-orders/add', [ModuleWorkOrdersController::class, 'addRequest']);
    $router->post('/work-orders/add', [ModuleWorkOrdersController::class, 'submitRequest']);
    $router->get('/work-order/{id}/edit', [ModuleWorkOrdersController::class, 'editRequest']);
    $router->post('/work-order/{id}/edit', [ModuleWorkOrdersController::class, 'updateRequest']);
    $router->get('/work-order/{id}/delete', [ModuleWorkOrdersController::class, 'deleteRequest']);

});

?>