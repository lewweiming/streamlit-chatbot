<?php

/**
All methods:
- home
 */

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleHotelDataController extends CoreController
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
        return $this->twig->render('tr-hotel-bookings/views/admin/hotels-data/index.html');
    }

    function addHotel()
    {
        return $this->twig->render('tr-hotel-bookings/views/admin/hotels-data/add_hotel.html');
    }

    function editHotel($id)
    {
        $item = HotelV1::find($id);

        return $this->twig->render('tr-hotel-bookings/views/admin/hotels-data/edit_hotel.html', ['item' => $item]);
    }

    function submitHotel(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        $payload['user_id'] = $user_id;

        HotelV1::insert($payload);

        Flash::add('success', 'New hotel added!');

        return new RedirectResponse('/framework/admin/hotel-bookings/hotels-data/main');
    }

    function updateHotel($id, ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        HotelV1::update($id, $payload);

        Flash::add('success', 'Hotel updated!');

        return new RedirectResponse('/framework/admin/hotel-bookings/hotels-data/main');
    }

    function deleteHotel($id)
    {
        HotelV1::delete($id);

        Flash::add('success', 'Hotel deleted!');

        return new RedirectResponse('/framework/admin/hotel-bookings/hotels-data/main');
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
