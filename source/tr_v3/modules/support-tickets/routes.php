<?php

use MiladRahimi\PhpRouter\Router;

$router->group(['prefix' => '/framework/admin', 'middleware' => [SimpleAuthMiddleware::class]], function (Router $router) {

    $router->get('/support-tickets', [ModuleSupportTicketsController::class, 'index']);
    $router->get('/support-tickets/add', [ModuleSupportTicketsController::class, 'addTicket']);
    $router->post('/support-tickets/add', [ModuleSupportTicketsController::class, 'submitTicket']);
    $router->get('/support-ticket/{id}/edit', [ModuleSupportTicketsController::class, 'editTicket']);
    $router->post('/support-ticket/{id}/edit', [ModuleSupportTicketsController::class, 'updateTicket']);
    $router->get('/support-ticket/{id}/delete', [ModuleSupportTicketsController::class, 'deleteTicket']);

});

?>