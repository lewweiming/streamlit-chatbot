<?php

use MiladRahimi\PhpRouter\Router;

/* THREADS */

$router->group(['prefix' => '/forum'], function(Router $router) {

    // CREATE THREAD
    // CREATE REPLY
    $router->get('/threads', [ModuleForumsController::class, 'showThreads']);
    $router->get('/thread/{id}', [ModuleForumsController::class, 'showThread']);
    $router->get('/threads/create', [ModuleForumsController::class, 'createThread']);
    $router->post('/threads/create', [ModuleForumsController::class, 'postThread']);
    $router->post('/thread/{id}/reply', [ModuleForumsController::class, 'postReply']);
});

$router->group(['prefix' => '/framework/admin','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {

});

?>