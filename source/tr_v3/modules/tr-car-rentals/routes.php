<?php

use MiladRahimi\PhpRouter\Router;

/* OTHERS */
$router->get('/modules/car-rentals/available-cars', [ModuleCarRentalsController::class, 'showAvailableCars']);
$router->get('/modules/car-rentals/receipt', [ModuleCarRentalsController::class, 'showReceipt']);

/* USER ACCOUNT FUNCTIONS */
$router->get('/modules/car-rentals/bookings-dashboard', [ModuleCarRentalsController::class, 'showUserBookingsDashboard']);
$router->get('/modules/car-rentals/booking-modification/{booking_ref}', [ModuleCarRentalsController::class, 'showBookingModification']);
$router->post('/modules/car-rentals/booking-modification', [ModuleCarRentalsController::class, 'submitBookingModification']);
$router->get('/modules/car-rentals/booking-cancellation/{booking_ref}', [ModuleCarRentalsController::class, 'showBookingCancellation']);
$router->post('/modules/car-rentals/booking-cancellation', [ModuleCarRentalsController::class, 'submitBookingCancellation']);


/* FOR TESTING PURPOSES */
$router->get('/modules/car-rentals/checkout', [ModuleCarRentalsController::class, 'showCheckout']);
$router->post('/modules/car-rentals/checkout', [ModuleCarRentalsController::class, 'submitCheckout']);

/* CHECKOUT */
$router->get('/modules/car-rentals', [ModuleCarRentalsCheckoutController::class, 'showWelcome']);
$router->get('/modules/car-rentals/selection', [ModuleCarRentalsCheckoutController::class, 'submitSelection']);
$router->get('/modules/car-rentals/checkout/personal-details', [ModuleCarRentalsCheckoutController::class, 'showPersonalDetails']);
$router->post('/modules/car-rentals/checkout/personal-details', [ModuleCarRentalsCheckoutController::class, 'submitPersonalDetails']);
$router->get('/modules/car-rentals/checkout/review-payment', [ModuleCarRentalsCheckoutController::class, 'showReviewPayment']);

$router->group(['prefix' => '/framework/admin/car-rentals','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {

    $router->get('/cars-dashboard', [ModuleCarRentalsController::class, 'adminCarsDashboard']);
    $router->get('/bookings-dashboard', [ModuleCarRentalsController::class, 'adminBookingsDashboard']);
    $router->get('/booking-details/{id}', [ModuleCarRentalsController::class, 'adminBookingDetails']);
    $router->get('/add-booking', [ModuleCarRentalsController::class, 'adminAddBooking']);
    $router->post('/add-booking', [ModuleCarRentalsController::class, 'adminSubmitBooking']);
    $router->get('/delete-booking/{id}', [ModuleCarRentalsController::class, 'adminDeleteBooking']);
    $router->get('/modify-booking/{id}', [ModuleCarRentalsController::class, 'adminModifyBooking']);
    $router->post('/modify-booking/{id}', [ModuleCarRentalsController::class, 'adminSubmitBookingModification']);
    $router->get('/cancel-booking/{id}', [ModuleCarRentalsController::class, 'adminCancelBooking']);
    $router->post('/cancel-booking/{id}', [ModuleCarRentalsController::class, 'adminSubmitBookingCancellation']);
    $router->get('/confirm-booking/{id}', [ModuleCarRentalsController::class, 'adminConfirmBooking']);
    $router->post('/confirm-booking/{id}', [ModuleCarRentalsController::class, 'adminSubmitBookingConfirmation']);
    $router->get('/receipts', [ModuleCarRentalsController::class, 'adminReceipts']);
    $router->get('/receipts/pdf/{receipt_number}', [ModuleCarRentalsController::class, 'adminShowReceiptAsPdf']);
    $router->get('/reports', [ModuleCarRentalsController::class, 'adminReports']);

});

/* CARS DATA */
$router->group(['prefix' => '/framework/admin/car-rentals/cars-data','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {    
    
    $router->get('/main', [ModuleCarRentalsCarDataController::class, 'index']);
    $router->get('/add', [ModuleCarRentalsCarDataController::class, 'addCar']);
    $router->post('/add', [ModuleCarRentalsCarDataController::class, 'submitCar']);
    $router->get('/car/{id}/edit', [ModuleCarRentalsCarDataController::class, 'editCar']);
    $router->post('/car/{id}/edit', [ModuleCarRentalsCarDataController::class, 'updateCar']);
    $router->get('/car/{id}/delete', [ModuleCarRentalsCarDataController::class, 'deleteCar']);

});

?>