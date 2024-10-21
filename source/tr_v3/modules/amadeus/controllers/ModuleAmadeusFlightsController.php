<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleAmadeusFlightsController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function admin()
    {
        return $this->twig->render('amadeus/views/admin/flights_main.html');
    }

    function showFlightApp()
    {
        return $this->twig->render('amadeus/views/flight-booking/main.html');
    }    

    function showCitySearch()
    {
        return $this->twig->render('amadeus/views/admin/flights/city_search.html');
    }

    function showServiceAirportRoutes()
    {
        return $this->twig->render('amadeus/views/admin/flights/airport_routes.html');
    }

    function showFlightOffers()
    {
        return $this->twig->render('amadeus/views/admin/flights/flight_offers.html');
    }

    function showFlightOffersPricing()
    {
        return $this->twig->render('amadeus/views/admin/flights/flight_offers_pricing.html');
    }

    function showFlightCreateOrder()
    {
        return $this->twig->render('amadeus/views/admin/flights/flight_create_order.html');
    }

    function editItem($id)
    {
        $item = X2FrameworkItem::find($id);

        return $this->twig->render('framework/edit_item.html', ['item' => $item]);
    }

    /* CRUD START */
    function insertItem(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        X2FrameworkItem::insert($payload);

        Flash::add('success', 'New item added!');

        return new RedirectResponse('/framework/admin/main');
    }

    function updateItem($id, ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        X2FrameworkItem::update($id, $payload);
        
        foreach($payload as $key => $value) {

            Flash::add('success', "{$key} set to ${value}");
        }

        return new RedirectResponse('/framework/admin/main');
    }

    function deleteItem($id)
    {
        X2FrameworkItem::delete($id);

        Flash::add('success', 'Item removed!');

        return new RedirectResponse('/framework/admin/main');
    }
    /* CRUD END */
}
?>