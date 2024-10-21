<?php

use MiladRahimi\PhpRouter\Router;

/* OTHERS */
$router->get('/modules/hotel-bookings/receipt', [ModuleHotelBookingsController::class, 'showReceipt']);

/* CHECKOUT */
$router->get('/modules/hotel-bookings', [ModuleHotelBookingsCheckoutController::class, 'showWelcome']);
$router->get('/modules/hotel-bookings/selection', [ModuleHotelBookingsCheckoutController::class, 'submitSelection']);
$router->get('/modules/hotel-bookings/checkout/personal-details', [ModuleHotelBookingsCheckoutController::class, 'showPersonalDetails']);
$router->post('/modules/hotel-bookings/checkout/personal-details', [ModuleHotelBookingsCheckoutController::class, 'submitPersonalDetails']);
$router->get('/modules/hotel-bookings/checkout/review-payment', [ModuleHotelBookingsCheckoutController::class, 'showReviewPayment']);

/* TO BE SORTED */
$router->get('/modules/hotel-bookings', [ModuleHotelBookingsController::class, 'welcome']);
$router->get('/modules/hotel-bookings/available-rooms', [ModuleHotelBookingsController::class, 'showAvailableRooms']);
$router->get('/modules/hotel-bookings/book-room', [ModuleHotelBookingsController::class, 'showBookRoom']);
$router->get('/modules/hotel-bookings/booking-details', [ModuleHotelBookingsController::class, 'showBookingDetails']);
$router->get('/modules/hotel-bookings/modify-booking', [ModuleHotelBookingsController::class, 'showModifyBooking']);
$router->post('/modules/hotel-bookings/booking-modification', [ModuleHotelBookingsController::class, 'submitBookingModification']);
$router->get('/modules/hotel-bookings/booking-cancellation', [ModuleHotelBookingsController::class, 'showBookingCancellation']);
$router->post('/modules/hotel-bookings/booking-cancellation', [ModuleHotelBookingsController::class, 'submitBookingCancellation']);
$router->get('/modules/hotel-bookings/checkout', [ModuleHotelBookingsController::class, 'showCheckout']);
$router->post('/modules/hotel-bookings/checkout', [ModuleHotelBookingsController::class, 'submitCheckout']);

$router->group(['prefix' => '/framework/admin/hotel-bookings','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {

    $router->get('/hotels-dashboard', [ModuleHotelBookingsController::class, 'adminHotelsDashboard']);
    $router->get('/bookings-dashboard', [ModuleHotelBookingsController::class, 'adminBookingsDashboard']);
    $router->get('/booking-details', [ModuleHotelBookingsController::class, 'adminBookingDetails']);
    $router->get('/add-booking', [ModuleHotelBookingsController::class, 'adminAddBooking']);
    $router->post('/add-booking', [ModuleHotelBookingsController::class, 'adminSubmitBooking']);
    $router->get('/modify-booking', [ModuleHotelBookingsController::class, 'adminModifyBooking']);
    $router->get('/cancel-booking', [ModuleHotelBookingsController::class, 'adminCancelBooking']);
    $router->get('/reports', [ModuleHotelBookingsController::class, 'adminReports']);

});

/* HOTELS DATA */
$router->group(['prefix' => '/framework/admin/hotel-bookings/hotels-data','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {    
    
    $router->get('/main', [ModuleHotelDataController::class, 'index']);
    $router->get('/add', [ModuleHotelDataController::class, 'addHotel']);
    $router->post('/add', [ModuleHotelDataController::class, 'submitHotel']);
    $router->get('/hotel/{id}/edit', [ModuleHotelDataController::class, 'editHotel']);
    $router->post('/hotel/{id}/edit', [ModuleHotelDataController::class, 'updateHotel']);
    $router->get('/hotel/{id}/delete', [ModuleHotelDataController::class, 'deleteHotel']);

});

/* ROOMS DATA */
$router->group(['prefix' => '/framework/admin/hotel-bookings/rooms-data','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {    
    
    $router->get('/main', [ModuleHotelRoomDataController::class, 'index']);
    $router->get('/add', [ModuleHotelRoomDataController::class, 'addRoom']);
    $router->post('/add', [ModuleHotelRoomDataController::class, 'submitRoom']);
    $router->get('/room/{id}/edit', [ModuleHotelRoomDataController::class, 'editRoom']);
    $router->post('/room/{id}/edit', [ModuleHotelRoomDataController::class, 'updateRoom']);
    $router->get('/room/{id}/delete', [ModuleHotelRoomDataController::class, 'deleteRoom']);

});



?>