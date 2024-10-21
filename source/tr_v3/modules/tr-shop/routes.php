<?php

use MiladRahimi\PhpRouter\Router;

/* CHECKOUT */
$router->get('/modules/shop', [ModuleShopCheckoutController::class, 'showWelcome']);
$router->get('/modules/shop/inventory', [ModuleShopCheckoutController::class, 'showInventory']);
$router->get('/modules/shop/inventory/{id}', [ModuleShopCheckoutController::class, 'showItemDetail']);
$router->get('/modules/shop/add-to-cart', [ModuleShopCheckoutController::class, 'addToCart']);
$router->get('/modules/shop/remove-from-cart', [ModuleShopCheckoutController::class, 'removeFromCart']);
$router->get('/modules/shop/cart', [ModuleShopCheckoutController::class, 'showCart']);
$router->get('/modules/shop/checkout/personal-details', [ModuleShopCheckoutController::class, 'showPersonalDetails']);
$router->post('/modules/shop/checkout/personal-details', [ModuleShopCheckoutController::class, 'submitPersonalDetails']);
$router->get('/modules/shop/checkout/delivery-details', [ModuleShopCheckoutController::class, 'showDeliveryDetails']);
$router->post('/modules/shop/checkout/delivery-details', [ModuleShopCheckoutController::class, 'submitDeliveryDetails']);
$router->get('/modules/shop/checkout/review-payment', [ModuleShopCheckoutController::class, 'showReviewPayment']);

/* USER ACCOUNT FUNCTIONS */
$router->get('/modules/shop/orders-dashboard', [ModuleShopUserController::class, 'showUserOrdersDashboard']);
$router->get('/modules/shop/order-modification/{order_ref}', [ModuleShopUserController::class, 'showOrderModification']);
$router->post('/modules/shop/order-modification', [ModuleShopUserController::class, 'submitOrderModification']);
$router->get('/modules/shop/order-cancellation/{order_ref}', [ModuleShopUserController::class, 'showOrderCancellation']);
$router->post('/modules/shop/order-cancellation', [ModuleShopUserController::class, 'submitOrderCancellation']);

/* SHOP INVENTORY DATA */
$router->group(['prefix' => '/framework/admin/shop/inventory','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {    
    
    $router->get('/main', [ModuleShopInventoryAdminController::class, 'index']);
    $router->get('/add', [ModuleShopInventoryAdminController::class, 'addItem']);
    $router->post('/add', [ModuleShopInventoryAdminController::class, 'submitItem']);
    $router->get('/item/{id}/edit', [ModuleShopInventoryAdminController::class, 'editItem']);
    $router->post('/item/{id}/edit', [ModuleShopInventoryAdminController::class, 'updateItem']);
    $router->get('/item/{id}/delete', [ModuleShopInventoryAdminController::class, 'deleteItem']);

});

?>