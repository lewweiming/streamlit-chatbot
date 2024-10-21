<?php

use MiladRahimi\PhpRouter\Router;


$router->get('/chatbot', [ModuleChatbotController::class, 'main']);

$router->group(['prefix' => '/framework/admin','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {

    $router->get('/news-articles', [NewsArticlesController::class, 'admin']);

});

?>