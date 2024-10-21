<?php

use MiladRahimi\PhpRouter\Router;

/* PAYPAL */
$router->get('/cashier', [CashierController::class, 'showCashier']); // Demonstrate Paypal in action
$router->get('/cashier/ads', [CashierController::class, 'checkoutSponsoredAds']); // Checkout for sponsored listings

$router->group(['prefix' => '/user', 'middleware' => [UserAccountMiddleware::class]], function (Router $router) {

    /* USER CASHIER RECEIPTS */
    // $router->get('/my-cashier-receipts', [CashierController::class, 'myCashierReceipts']);

});

$router->group(['prefix' => '/framework/admin','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {
    $router->get('/cashier', [CashierController::class, 'admin']);
    $router->get('/cashier/edit/{id}', [CashierController::class, 'adminEdit']);
    $router->post('/cashier/edit/{id}', [CashierController::class, 'adminUpdateRow']);
});

?>