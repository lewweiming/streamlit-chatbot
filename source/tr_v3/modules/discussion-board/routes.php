<?php

use MiladRahimi\PhpRouter\Router;

$router->get('/discussion-board', [DiscussionBoardController::class, 'main']);
$router->get('/discussion-board/add', [DiscussionBoardController::class, 'addDiscussion']);
$router->post('/discussion-board/add', [DiscussionBoardController::class, 'submitDiscussion']);
$router->get('/discussion-board/discussions/{discussion_id}', [DiscussionBoardController::class, 'showDiscussion']);
$router->post('/discussion-board/discussions/{discussion_id}', [DiscussionBoardController::class, 'submitReply']);
$router->get('/discussion-board/discussions/{discussion_id}/replies/{reply_id}/delete', [DiscussionBoardController::class, 'deleteReply']);

$router->group(['prefix' => '/framework/admin','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {

    $router->get('/discussion-board', [DiscussionBoardController::class, 'admin']);
    $router->get('/discussion-board/categories', [DiscussionBoardController::class, 'manageCategories']);
    $router->get('/discussion-board/discussions', [DiscussionBoardController::class, 'manageDiscussions']);
});

?>