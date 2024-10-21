<?php

use MiladRahimi\PhpRouter\Router;


$router->post('/customer-support/new-customer-request', [ModuleCustomerSupportController::class, 'submitNewCustomerRequest']);
$router->get('/customer-support/my-requests', [ModuleCustomerSupportController::class, 'showCustomerSupportDashboard']);
$router->get('/customer-support/request-details/{id}', [ModuleCustomerSupportController::class, 'showCustomerRequestDetails']);
$router->get('/customer-support/request-details/{id}/cancel', [ModuleCustomerSupportController::class, 'submitRequestCancellation']);

$router->group(['prefix' => '/user', 'middleware' => [UserAccountMiddleware::class]], function (Router $router) {

    // $router->get('/customer-support', [ModuleCustomerSupportController::class, 'showCustomerSupportDashboard']);

});

$router->group(['prefix' => '/framework/admin/customer-support','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {

    $router->get('/dashboard', [ModuleCustomerSupportController::class, 'admin']);

});

?>