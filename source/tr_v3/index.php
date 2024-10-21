<?php

# Maintenance Mode, comment out if not in maintenance
// header('Location: oops.html');
// exit;

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Router Start
use MiladRahimi\PhpRouter\Router;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;
use Laminas\Diactoros\Response\HtmlResponse;

$router = Router::create();

/* CLIENT */
$router->get('/', [PageController::class, 'home']);
$router->get('/p/{template}', [PageController::class, 'getPage']);
$router->get('/p/{category}/{template}', [PageController::class, 'getPageByCategory']);
$router->get('/md', [PageController::class, 'getPageMarkdown']);
$router->get('/article/{id}', [PageController::class, 'showArticle']);
$router->get('/jobs', [PageController::class, 'jobs']);
$router->get('/job', [PageController::class, 'job']);

/* EXAMPLES */
$router->get('/examples/e-bike', [X2ExamplesController::class, 'ebike']);

# MODULES
include('./modules/module-manager/routes.php');
include('./modules/file-searcher/routes.php');
include('./modules/support-tickets/routes.php');
include('./modules/blog/routes.php');
include('./modules/forums/routes.php');
include('./modules/discussion-board/routes.php');
include('./modules/work-orders/routes.php');
include('./modules/email/routes.php');
include('./modules/chatbot/routes.php');
include('./modules/cashier/routes.php');
include('./modules/customer-support/routes.php');
include('./modules/amadeus/routes.php');
include('./modules/tr-car-rentals/routes.php');
include('./modules/tr-flight-bookings/routes.php');
include('./modules/tr-trip-bookings/routes.php');
include('./modules/tr-hotel-bookings/routes.php');
include('./modules/tr-shop/routes.php');


/* ARTICLE */
$router->get('/articles', [X2ArticlesController::class, 'articles']);
$router->get('/article/{id}', [X2ArticlesController::class, 'article']);

/* X2 FILE UPLOADER */
$router->post('/x2-file-uploads/upload', [X2FileUploadController::class, 'uploadFile']);

/* AUTH */
$router->get('/login', [X2FrameworkAuthController::class, 'login']);
$router->post('/login', [X2FrameworkAuthController::class, 'postLogin']);
$router->get('/login/force', [X2FrameworkAuthController::class, 'forceLogin']); // For debugging
$router->get('/register', [X2FrameworkAuthController::class, 'register']);
$router->post('/register', [X2FrameworkAuthController::class, 'postRegister']);
$router->get('/password/forgot', [X2FrameworkAuthController::class, 'forgotPassword']);
$router->post('/password/forgot', [X2FrameworkAuthController::class, 'postForgotPassword']);
$router->get('/password/reset', [X2FrameworkAuthController::class, 'resetPassword']);
$router->post('/password/reset', [X2FrameworkAuthController::class, 'postResetPassword']);
$router->get('/logout', [X2FrameworkAuthController::class, 'logout']);

/* USER PROFILES */
// $router->get('/user/{username}', [UserProfileController::class, 'show']);

/* PAYPAL */
$router->get('/paypal', [PageController::class, 'getPaymentPage']);

/* USER ACCOUNT */
$router->group(['prefix' => '/user', 'middleware' => [UserAccountMiddleware::class]], function (Router $router) {

    /* AUTH */
    $router->get('/email/change', [X2FrameworkAuthController::class, 'changeEmail']);
    $router->post('/email/change', [X2FrameworkAuthController::class, 'postChangeEmail']);
    $router->get('/username/change', [X2FrameworkAuthController::class, 'changeUsername']);
    $router->post('/username/change', [X2FrameworkAuthController::class, 'postChangeUsername']);
    $router->get('/password/change', [X2FrameworkAuthController::class, 'changePassword']);
    $router->post('/password/change', [X2FrameworkAuthController::class, 'postChangePassword']);

    /* USER PROFILE */
    $router->get('/my-profile', [UserProfileController::class, 'myProfile']);
    $router->post('/my-profile', [UserProfileController::class, 'update']);
    $router->get('/my-profile-image', [UserProfileController::class, 'myProfileImage']);
    $router->post('/my-profile-image', [UserProfileController::class, 'uploadProfileImage']);
    $router->get('/my-profile-image/remove', [UserProfileController::class, 'removeProfileImage']);

    /* USER INBOX */
    $router->get('/my-inbox', [UserInboxController::class, 'myInbox']);

});

/* ARTICLE + FILE MANAGER + ADMIN EXTENSION */
$router->group(['prefix' => '/framework'], function(Router $router) {
    $router->get('/logout', [X2FrameworkController::class, 'attemptLogout']);
    $router->get('/login', [X2FrameworkController::class, 'login']);
    $router->post('/login', [X2FrameworkController::class, 'attemptLogin']);
   
});

$router->group(['prefix' => '/framework/admin','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {
    
    /* DASHBOARD */
    $router->get('/main', [PageController::class, 'admin']);
    $router->get('/dashboard-apps', [PageController::class, 'adminDashboardApps']);
    

    /* ERROR LOG */
    $router->get('/error-log', [ErrorLogController::class, 'showErrorLog']);
    $router->get('/error-log-apache', [ErrorLogController::class, 'showErrorLogApache']);

    /* ARTICLE */
    $router->get('/articles', [X2ArticlesController::class, 'admin']);
    $router->get('/articles/create', [X2ArticlesController::class, 'createArticle']);
    $router->post('/articles/create', [X2ArticlesController::class, 'insertArticle']);
    $router->get('/article/{id}/comments', [X2ArticlesController::class, 'comments']);
    $router->get('/article/{id}/preview', [X2ArticlesController::class, 'previewArticle']);
    $router->get('/article/{id}', [X2ArticlesController::class, 'editArticle']);
    $router->post('/article/{id}', [X2ArticlesController::class, 'updateArticle']);
    $router->get('/article/{id}/delete', [X2ArticlesController::class, 'deleteArticle']);
    $router->get('/article/{id}/files', [X2ArticlesController::class, 'editArticleFiles']);
    $router->post('/article/{id}/files/remove', [X2ArticlesController::class, 'removeFile']);
    $router->post('/article/{id}/files/upload', [X2ArticlesController::class, 'uploadFile']);
    $router->get('/article/{id}/images', [X2ArticlesController::class, 'editArticleImages']);
    $router->post('/article/{id}/images/remove', [X2ArticlesController::class, 'removeImage']);
    $router->post('/article/{id}/images/upload', [X2ArticlesController::class, 'uploadImage']);
    $router->post('/articles/thumbnail', [X2ArticlesController::class, 'ajaxSetItemImageThumbnail']);

    /* USERS */
    $router->get('/users', [X2UserController::class, 'admin']);
    $router->get('/user/{id}/delete', [X2UserController::class, 'delete']);

    /* USER INBOX */
    $router->get('/user-inbox', [UserInboxController::class, 'admin']);
    
    /* PLUGINS */
    $router->get('/plugins/install', [X2FPluginsController::class, 'showPluginsToInstall']);
    $router->get('/plugins/install/{plugin}', [X2FPluginsController::class, 'showPlugin']);
    $router->get('/plugins/install/{plugin}/table', [X2FPluginsController::class, 'installTable']);
    
    /* DEFINITIONS */
    $router->get('/definitions', [X2FrameworkController::class, 'showDefinitions']);
    $router->post('/definitions', [X2FrameworkController::class, 'updateDefinitions']);
   /* ROUTES */
    $router->get('/routes', [X2FrameworkController::class, 'showRoutes']);
    $router->post('/routes', [X2FrameworkController::class, 'updateRoutes']);
    /* TWIG */
    $router->get('/twig', [X2FrameworkController::class, 'twigMain']);
    $router->post('/twig/clear-cache', [X2FrameworkController::class, 'twigClearCache']);
    /* DEBUGGER */
    $router->get('/debugger/main', [DebuggerController::class, 'admin']);
    $router->get('/debugger/message/{id}/delete', [DebuggerController::class, 'deleteMessage']);
    $router->get('/debugger/message/{id}/read', [DebuggerController::class, 'ajaxMarkIsRead']);
    /* FILE MANAGER */
    $router->get('/file-manager', [X2FileManagerController::class, 'fileManager']);
    $router->get('/file-manager/scan', [X2FileManagerController::class, 'ajaxScanFolder']);
    $router->delete('/file-manager', [X2FileManagerController::class, 'ajaxDeleteFile']);
    $router->get('/file-manager/content', [X2FileManagerController::class, 'ajaxFetchFileContent']);
    $router->post('/file-manager/rename', [X2FileManagerController::class, 'ajaxRename']); // Works for both files, folders and moving files
    $router->post('/file-manager/upload', [X2FileManagerController::class, 'ajaxUpload']);
    $router->post('/file-manager/file/new', [X2FileManagerController::class, 'ajaxAddFile']);
    $router->post('/file-manager/file/update', [X2FileManagerController::class, 'ajaxUpdateFile']);
    $router->post('/file-manager/folder/new', [X2FileManagerController::class, 'ajaxAddFolder']);
    $router->post('/file-manager/folder/remove', [X2FileManagerController::class, 'ajaxRemoveFolder']);
    /* EXAMPLES */
    $router->get('/examples/graphs', [X2ExamplesController::class, 'graphs']);
    /* PAGES */
    $router->get('/pages', [X2FPagesController::class, 'admin']);
    $router->post('/pages/add', [X2FPagesController::class, 'addPage']);
    $router->get('/pages/edit', [X2FPagesController::class, 'editPage']);
    $router->post('/pages/edit', [X2FPagesController::class, 'updatePage']);
    $router->get('/pages/delete', [X2FPagesController::class, 'deletePage']);
    /* CRUD */
    $router->get('/crud', [CRUDController::class, 'admin']);
    $router->post('/crud', [CRUDController::class, 'generate']);
    /* X2 FILE UPLOADER */
    $router->get('/x2-file-uploads', [X2FileUploadController::class, 'admin']);
    $router->post('/x2-file-uploads/upload', [X2FileUploadController::class, 'uploadFile']);
    /* INBOX MESSAGES */
    $router->get('/inbox/main', [InboxController::class, 'admin']);
    $router->post('/inbox/message', [InboxController::class, 'insertMessage']);
    $router->get('/inbox/message/{id}', [InboxController::class, 'editMessage']);
    $router->post('/inbox/message/{id}', [InboxController::class, 'updateMessage']);
    $router->get('/inbox/message/{id}/preview', [InboxController::class, 'previewMessage']);    
    $router->get('/inbox/message/{id}/delete', [InboxController::class, 'deleteMessage']);
    /* DATABASE */
    $router->get('/database', [DatabaseController::class, 'admin']);
    $router->get('/database/ajax/tables', [DatabaseController::class, 'ajaxGetTables']);
    $router->get('/database/ajax/table/columns', [DatabaseController::class, 'ajaxGetTableColumns']);
    $router->get('/database/ajax/table/rows', [DatabaseController::class, 'ajaxGetTableRows']);
    $router->get('/database/ajax/table/rows/paginated', [DatabaseController::class, 'ajaxGetTableRowsPaginated']);
    $router->post('/database/ajax/table/row/update', [DatabaseController::class, 'ajaxUpdateRow']);
    $router->post('/database/ajax/table/row/delete', [DatabaseController::class, 'ajaxDeleteRow']);

});

// $router->dispatch();

/* CUSTOM ERROR MESSAGES */
// try {
//     $router->dispatch();
// } catch (RouteNotFoundException $e) {
//     // It's 404!
//     $router->getPublisher()->publish(new HtmlResponse('Path could not be found.', 404));
// } catch (Throwable $e) {
//     // Log and report...
//     $router->getPublisher()->publish(new HtmlResponse('Website currently under maintenance. Please check back a few minutes later.', 500));
// }

$router->dispatch();
/* CATCH EXCEPTIONS */
// try {
//     $router->dispatch();
// } catch (RouteNotFoundException $e) {
//     // It's 404!
//     $router->getPublisher()->publish(new HtmlResponse('404', 404));
// } catch (Throwable $e) {
    
//     // Log and report...
//     error_log(print_r($e, true), 3, ERROR_LOG_PATH);
//     $router->getPublisher()->publish(new HtmlResponse('500', 500));
// }
?>