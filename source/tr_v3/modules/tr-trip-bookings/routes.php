<?php

use MiladRahimi\PhpRouter\Router;

/* OTHERS */
$router->get('/modules/trip-bookings/receipt', [ModuleTripBookingsController::class, 'showReceipt']);

/* CHECKOUT */
$router->get('/modules/trip-bookings', [ModuleTripBookingsCheckoutController::class, 'showWelcome']);
$router->get('/modules/trip-bookings/selection', [ModuleTripBookingsCheckoutController::class, 'submitSelection']);
$router->get('/modules/trip-bookings/checkout/personal-details', [ModuleTripBookingsCheckoutController::class, 'showPersonalDetails']);
$router->post('/modules/trip-bookings/checkout/personal-details', [ModuleTripBookingsCheckoutController::class, 'submitPersonalDetails']);
$router->get('/modules/trip-bookings/checkout/review-payment', [ModuleTripBookingsCheckoutController::class, 'showReviewPayment']);

/* TO BE SORTED */
$router->get('/modules/trip-bookings', [ModuleTripBookingsController::class, 'welcome']);
$router->get('/modules/trip-bookings/available-trips', [ModuleTripBookingsController::class, 'showAvailableTrips']);
$router->get('/modules/trip-bookings/booking-details', [ModuleTripBookingsController::class, 'showBookingDetails']);
$router->post('/modules/trip-bookings/booking-modification', [ModuleTripBookingsController::class, 'submitBookingModification']);
$router->get('/modules/trip-bookings/booking-cancellation', [ModuleTripBookingsController::class, 'showBookingCancellation']);
$router->post('/modules/trip-bookings/booking-cancellation', [ModuleTripBookingsController::class, 'submitBookingCancellation']);
$router->get('/modules/trip-bookings/trip-booking', [ModuleTripBookingsController::class, 'showTripBooking']);
$router->get('/modules/trip-bookings/checkout', [ModuleTripBookingsController::class, 'showCheckout']);
$router->post('/modules/trip-bookings/checkout', [ModuleTripBookingsController::class, 'submitCheckout']);

$router->group(['prefix' => '/framework/admin/trip-bookings','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {

    $router->get('/trips-dashboard', [ModuleTripBookingsController::class, 'adminTripsDashboard']);
    $router->get('/bookings-dashboard', [ModuleTripBookingsController::class, 'adminBookingsDashboard']);
    $router->get('/booking-details', [ModuleTripBookingsController::class, 'adminBookingDetails']);
    $router->get('/add-booking', [ModuleTripBookingsController::class, 'adminAddBooking']);
    $router->post('/add-booking', [ModuleTripBookingsController::class, 'adminSubmitBooking']);
    $router->get('/modify-booking', [ModuleTripBookingsController::class, 'adminModifyBooking']);
    $router->get('/cancel-booking', [ModuleTripBookingsController::class, 'adminCancelBooking']);
    $router->get('/reports', [ModuleTripBookingsController::class, 'adminReports']);


    // $router->get('/cars-dashboard', [ModuleCarRentalsController::class, 'adminCarsDashboard']);
    // $router->get('/bookings-dashboard', [ModuleCarRentalsController::class, 'adminBookingsDashboard']);
    // $router->get('/booking-details/{id}', [ModuleCarRentalsController::class, 'adminBookingDetails']);
    // $router->get('/add-booking', [ModuleCarRentalsController::class, 'adminAddBooking']);
    // $router->post('/add-booking', [ModuleCarRentalsController::class, 'adminSubmitBooking']);
    // $router->get('/delete-booking/{id}', [ModuleCarRentalsController::class, 'adminDeleteBooking']);
    // $router->get('/modify-booking/{id}', [ModuleCarRentalsController::class, 'adminModifyBooking']);
    // $router->post('/modify-booking/{id}', [ModuleCarRentalsController::class, 'adminSubmitBookingModification']);
    // $router->get('/cancel-booking/{id}', [ModuleCarRentalsController::class, 'adminCancelBooking']);
    // $router->post('/cancel-booking/{id}', [ModuleCarRentalsController::class, 'adminSubmitBookingCancellation']);
    // $router->get('/confirm-booking/{id}', [ModuleCarRentalsController::class, 'adminConfirmBooking']);
    // $router->post('/confirm-booking/{id}', [ModuleCarRentalsController::class, 'adminSubmitBookingConfirmation']);
    // $router->get('/receipts', [ModuleCarRentalsController::class, 'adminReceipts']);
    // $router->get('/receipts/pdf/{receipt_number}', [ModuleCarRentalsController::class, 'adminShowReceiptAsPdf']);
    // $router->get('/reports', [ModuleCarRentalsController::class, 'adminReports']);    


});

/* CARS DATA */
$router->group(['prefix' => '/framework/admin/trip-bookings/trips-data','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {    
    
    $router->get('/main', [ModuleTripDataController::class, 'index']);
    $router->get('/add', [ModuleTripDataController::class, 'addTrip']);
    $router->post('/add', [ModuleTripDataController::class, 'submitTrip']);
    $router->get('/trip/{id}/edit', [ModuleTripDataController::class, 'editTrip']);
    $router->post('/trip/{id}/edit', [ModuleTripDataController::class, 'updateTrip']);
    $router->get('/trip/{id}/delete', [ModuleTripDataController::class, 'deleteTrip']);

});

?>