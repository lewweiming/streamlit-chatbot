<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleCustomerSupportController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function showCustomerSupportDashboard()
    {
        $rows = CustomerRequest::all();

        return $this->twig->render('customer-support/views/customer_request_dashboard.html', ['rows' => $rows]);
    }

    function showCustomerRequestDetails($id)
    {
        $request = CustomerRequest::find($id);

        return $this->twig->render('customer-support/views/customer_request_details.html', ['request' => $request]);
    }

    function submitRequestCancellation($id)
    {
        CustomerRequest::update($id, [
            'status' => 'cancelled'
        ]);

        Flash::add('success', 'The request has been cancelled!');

        return new RedirectResponse("/customer-support/request-details/$id");
    }

    function submitNewCustomerRequest(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        # Validate
        $v = new Valitron\Validator($payload);
        $v->rule('required', 'ref_number');
        $v->rule('required', 'ref_table');
        $v->rule('required', 'ref_type');
        $v->rule('required', 'request_type');
        $v->rule('required', 'request_info');
        $v->rule('required', 'details');
        $v->rule('required', 'reason');
        if(!$v->validate()) {
            Flash::setValidationErrors($v->errors());
            return new RedirectResponse($request->getHeaderLine('Referer'));    
        }

        $data = [
            'ref_number' => $payload['ref_number'],
            'ref_table' => $payload['ref_table'],
            'ref_type' => $payload['ref_type'],
            'request_type' => $payload['request_type'],
            'request_info' => $payload['request_info'],
            'details' => $payload['details'],
            'reason' => $payload['reason']
        ];


        CustomerRequest::insert($data);

        Flash::add('success', 'New request submitted!');

        return new RedirectResponse('/customer-support/my-requests');
    }

    function admin()
    {
        // $rows = X2FrameworkItem::fetchContext();

        return $this->twig->render('customer-support/views/admin/customer_request_dashboard_manager.html');
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