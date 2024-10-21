<?php

/**
All methods:
- home
 */

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleWorkOrdersController extends CoreController
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
        $rows = WorkOrder::all();

        return $this->twig->render('work-orders/views/work_orders.html', ['rows' => $rows]);
    }

    function preview($id)
    {
        $order = WorkOrder::find($id);

        return $this->twig->render('work-orders/views/preview.html', ['order' => $order]);
    }

    function adminIndex()
    {
        $rows = WorkOrder::all();

        return $this->twig->render('work-orders/views/admin/index.html', ['rows' => $rows]);
    }

    function addRequest()
    {
        return $this->twig->render('work-orders/views/admin/add_request.html');
    }

    function editRequest($id)
    {
        $order = WorkOrder::find($id);

        return $this->twig->render('work-orders/views/admin/edit_request.html', ['order' => $order]);
    }

    function submitRequest(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        # Validate
        $v = new Valitron\Validator($payload);

        // Define validation rules
        $v->rule('required', 'title')->message('Title is required');
        $v->rule('required', 'description')->message('Description is required');
        // $v->rule('required', 'goals')->message('Goals are required');
        // $v->rule('required', 'start_date')->message('Start Date is required');
        // $v->rule('required', 'end_date')->message('End Date is required');
        // $v->rule('required', 'is_training_provided')->message('Is training provided is required');
        // $v->rule('required', 'name')->message('Person name in charge of project is required');
        // $v->rule('required', 'email')->message('Contact email address is required');
        // $v->rule('email', 'email')->message('Contact email address must be a valid email');

        // Validate the form
        if (!$v->validate()) {
            // If validation fails, set validation errors and redirect back
            Flash::setValidationErrors($v->errors());
            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        WorkOrder::insert($payload);

        Flash::add('success', 'New work order added!');

        return new RedirectResponse('/framework/admin/work-orders');
    }

    function updateRequest($id, ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        # Validate
        $v = new Valitron\Validator($payload);

        // Define validation rules
        $v->rule('required', 'title')->message('Title is required');
        $v->rule('required', 'description')->message('Description is required');
        // $v->rule('required', 'goals')->message('Goals are required');
        // $v->rule('required', 'start_date')->message('Start Date is required');
        // $v->rule('required', 'end_date')->message('End Date is required');
        // $v->rule('required', 'is_training_provided')->message('Is training provided is required');
        // $v->rule('required', 'name')->message('Person name in charge of project is required');
        // $v->rule('required', 'email')->message('Contact email address is required');
        // $v->rule('email', 'email')->message('Contact email address must be a valid email');

        // Validate the form
        if (!$v->validate()) {
            // If validation fails, set validation errors and redirect back
            Flash::setValidationErrors($v->errors());
            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        WorkOrder::update($id, $payload);

        Flash::add('success', 'Work order updated!');

        return new RedirectResponse('/framework/admin/work-orders');
    }

    function deleteRequest($id)
    {
        WorkOrder::delete($id);

        Flash::add('success', 'Work order deleted!');

        return new RedirectResponse('/framework/admin/work-orders');
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
