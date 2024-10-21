<?php

use MiladRahimi\PhpRouter\Router;

/* OTHERS */
$router->get('/modules/flight-bookings/receipt', [ModuleFlightBookingsController::class, 'showReceipt']);

/* CHECKOUT */
$router->get('/modules/flight-bookings', [ModuleFlightBookingsCheckoutController::class, 'showWelcome']);
$router->get('/modules/flight-bookings/selection', [ModuleFlightBookingsCheckoutController::class, 'submitSelection']);
$router->get('/modules/flight-bookings/checkout/personal-details', [ModuleFlightBookingsCheckoutController::class, 'showPersonalDetails']);
$router->post('/modules/flight-bookings/checkout/personal-details', [ModuleFlightBookingsCheckoutController::class, 'submitPersonalDetails']);
$router->get('/modules/flight-bookings/checkout/review-payment', [ModuleFlightBookingsCheckoutController::class, 'showReviewPayment']);

/* TO BE SORTED */
$router->get('/modules/flight-bookings/booking-confirmation', [ModuleFlightBookingsController::class, 'showBookingConfirmmation']);
$router->post('/modules/flight-bookings/booking-modification', [ModuleFlightBookingsController::class, 'submitBookingModification']);
$router->get('/modules/flight-bookings/booking-cancellation', [ModuleFlightBookingsController::class, 'showBookingCancellation']);
$router->post('/modules/flight-bookings/booking-cancellation', [ModuleFlightBookingsController::class, 'submitBookingCancellation']);
$router->get('/modules/flight-bookings/flight-search', [ModuleFlightBookingsController::class, 'showFlightSearch']);
$router->get('/modules/flight-bookings/manage-bookings', [ModuleFlightBookingsController::class, 'showManageBookings']);
$router->get('/modules/flight-bookings/checkout', [ModuleFlightBookingsController::class, 'showCheckout']);
$router->post('/modules/flight-bookings/checkout', [ModuleFlightBookingsController::class, 'submitCheckout']);

$router->group(['prefix' => '/framework/admin/flight-bookings','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {

    $router->get('/flights-dashboard', [ModuleFlightBookingsController::class, 'adminFlightsDashboard']);
    $router->get('/bookings-dashboard', [ModuleFlightBookingsController::class, 'adminBookingsDashboard']);
    $router->get('/booking-details', [ModuleFlightBookingsController::class, 'adminBookingDetails']);
    $router->get('/add-booking', [ModuleFlightBookingsController::class, 'adminAddBooking']);
    $router->post('/add-booking', [ModuleFlightBookingsController::class, 'adminSubmitBooking']);
    $router->get('/modify-booking', [ModuleFlightBookingsController::class, 'adminModifyBooking']);
    $router->get('/cancel-booking', [ModuleFlightBookingsController::class, 'adminCancelBooking']);
    $router->get('/reports', [ModuleFlightBookingsController::class, 'adminReports']);

});

?>