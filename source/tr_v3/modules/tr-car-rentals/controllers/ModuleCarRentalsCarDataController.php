<?php

/**
All methods:
- home
 */

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleCarRentalsCarDataController extends CoreController
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
        $rows = CarRentalsCarV1::all();

        return $this->twig->render('tr-car-rentals/views/admin/cars-data/index.html', ['rows' => $rows]);
    }

    function addCar()
    {
        return $this->twig->render('tr-car-rentals/views/admin/cars-data/add_car.html');
    }

    function editCar($id)
    {
        $item = CarRentalsCarV1::find($id);

        return $this->twig->render('tr-car-rentals/views/admin/cars-data/edit_car.html', ['item' => $item]);
    }

    function submitCar(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        $payload['user_id'] = $user_id;

        CarRentalsCarV1::insert($payload);

        Flash::add('success', 'New car added!');

        return new RedirectResponse('/framework/admin/car-rentals/cars-data/main');
    }

    function updateCar($id, ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        CarRentalsCarV1::update($id, $payload);

        Flash::add('success', 'Car updated!');

        return new RedirectResponse('/framework/admin/car-rentals/cars-data/main');
    }

    function deleteCar($id)
    {
        CarRentalsCarV1::delete($id);

        Flash::add('success', 'Car deleted!');

        return new RedirectResponse('/framework/admin/car-rentals/cars-data/main');
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
