<?php

/**
All methods:
- home
 */

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleTripDataController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        return $this->twig->render('tr-trip-bookings/views/admin/trips-data/index.html');
    }

    function addTrip()
    {
        return $this->twig->render('tr-trip-bookings/views/admin/trips-data/add_trip.html');
    }

    function editTrip($id)
    {
        $item = TripV1::find($id);

        return $this->twig->render('tr-trip-bookings/views/admin/trips-data/edit_trip.html', ['item' => $item]);
    }

    function submitTrip(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        $payload['user_id'] = $user_id;

        TripV1::insert($payload);

        Flash::add('success', 'New trip added!');

        return new RedirectResponse('/framework/admin/trip-bookings/trips-data/main');
    }

    function updateTrip($id, ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        TripV1::update($id, $payload);

        Flash::add('success', 'Trip updated!');

        return new RedirectResponse('/framework/admin/trip-bookings/trips-data/main');
    }

    function deleteTrip($id)
    {
        TripV1::delete($id);

        Flash::add('success', 'Trip deleted!');

        return new RedirectResponse('/framework/admin/trip-bookings/trips-data/main');
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

        foreach ($payload as $key => $value) {

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
