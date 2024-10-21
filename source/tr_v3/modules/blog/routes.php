<?php

use MiladRahimi\PhpRouter\Router;

$router->group(['prefix' => '/framework/admin','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {

    $router->get('/blog', [ModuleBlogController::class, 'admin']);
    $router->get('/blog/create', [ModuleBlogController::class, 'createPost']);
    $router->post('/blog/create', [ModuleBlogController::class, 'insertItem']);
    $router->get('/blog/post/{id}', [ModuleBlogController::class, 'editPost']);
    $router->post('/blog/post/{id}', [ModuleBlogController::class, 'updateItem']);
    $router->get('/blog/post/{id}/images', [ModuleBlogController::class, 'editPostImages']);
    $router->post('/blog/post/{id}/images/remove', [ModuleBlogController::class, 'removeImage']);
    $router->post('/blog/post/{id}/images/upload', [ModuleBlogController::class, 'uploadImage']);
    $router->post('/blog/thumbnail', [ModuleBlogController::class, 'ajaxSetItemImageThumbnail']);

});

?>