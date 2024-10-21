<?php

use MiladRahimi\PhpRouter\Router;

// Flight Booking Apps
$router->get('/amadeus-flight-app', [ModuleAmadeusFlightsController::class, 'showFlightApp']);
// Hotel Booking Apps
$router->get('/amadeus-hotel-app', [ModuleAmadeusHotelsController::class, 'showHotelApp']);

$router->group(['prefix' => '/framework/admin/amadeus','middleware' => [SimpleAuthMiddleware::class]], function(Router $router) {

    // Shows main panel
    $router->get('/main', [ModuleAmadeusController::class, 'admin']);

    // Shows flight data
    $router->get('/flights/main', [ModuleAmadeusFlightsController::class, 'admin']);
    $router->get('/flights/city-search', [ModuleAmadeusFlightsController::class, 'showCitySearch']);
    $router->get('/flights/airport-routes', [ModuleAmadeusFlightsController::class, 'showServiceAirportRoutes']);
    $router->get('/flights/flight-offers', [ModuleAmadeusFlightsController::class, 'showFlightOffers']);
    $router->get('/flights/flight-offers-pricing', [ModuleAmadeusFlightsController::class, 'showFlightOffersPricing']);
    $router->get('/flights/flight-create-order', [ModuleAmadeusFlightsController::class, 'showFlightCreateOrder']);

    // Hotels
    $router->get('/hotels/main', [ModuleAmadeusHotelsController::class, 'admin']);
    $router->get('/hotels/hotel-list', [ModuleAmadeusHotelsController::class, 'showHotelList']);
    $router->get('/hotels/hotel-search', [ModuleAmadeusHotelsController::class, 'showHotelSearch']);

    // Trips
    $router->get('/trips/main', [ModuleAmadeusTripsController::class, 'admin']);
    $router->get('/trips/tour-search', [ModuleAmadeusTripsController::class, 'showTourSearch']);

    // Car Transfers
    $router->get('/transfers/main', [ModuleAmadeusTransfersController::class, 'admin']);

});

?>