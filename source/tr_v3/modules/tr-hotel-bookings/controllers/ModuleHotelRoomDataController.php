<?php

/**
All methods:
- home
 */

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleHotelRoomDataController extends CoreController
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
        return $this->twig->render('tr-hotel-bookings/views/admin/rooms-data/index.html');
    }

    function addRoom()
    {
        return $this->twig->render('tr-hotel-bookings/views/admin/rooms-data/add_room.html');
    }

    function editRoom($id)
    {
        $item = HotelRoomV1::find($id);

        return $this->twig->render('tr-hotel-bookings/views/admin/rooms-data/edit_room.html', ['item' => $item]);
    }

    function submitRoom(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        $payload['user_id'] = $user_id;

        HotelRoomV1::insert($payload);

        Flash::add('success', 'New room added!');

        return new RedirectResponse('/framework/admin/hotel-bookings/rooms-data/main');
    }

    function updateRoom($id, ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        HotelRoomV1::update($id, $payload);

        Flash::add('success', 'Room updated!');

        return new RedirectResponse('/framework/admin/hotel-bookings/rooms-data/main');
    }

    function deleteRoom($id)
    {
        HotelRoomV1::delete($id);

        Flash::add('success', 'Room deleted!');

        return new RedirectResponse('/framework/admin/hotel-bookings/rooms-data/main');
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
