<?php

/**
All methods:
- home
 */

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleSupportTicketsController extends CoreController
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
        $rows = SupportTicket::all();

        return $this->twig->render('support-tickets/views/admin/index.html', ['rows' => $rows]);
    }

    function addTicket()
    {
        return $this->twig->render('support-tickets/views/admin/add_ticket.html');
    }

    function editTicket($id)
    {
        $ticket = SupportTicket::find($id);

        return $this->twig->render('support-tickets/views/admin/edit_ticket.html', ['ticket' => $ticket]);
    }

    function submitTicket(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        # Validate
        $v = new Valitron\Validator($payload);

        // Define validation rules
        $v->rule('required', 'title')->message('Title is required');
        $v->rule('required', 'description')->message('Description is required');
        $v->rule('required', 'priority')->message('Priority is required');
        $v->rule('required', 'status')->message('Status is required');

        // Custom rules for field values
        $v->rule('in', 'priority', ['Low', 'Medium', 'High', 'Urgent'])->message('Priority must be Low, Medium, High, or Urgent');
        $v->rule('in', 'status', ['Open', 'In Progress', 'Closed'])->message('Status must be Open, In Progress, or Closed');

        // Optional field: Tags (if applicable, you can add further validation here if needed)


        // Validate the form
        if (!$v->validate()) {
            // If validation fails, set validation errors and redirect back
            Flash::setValidationErrors($v->errors());
            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        SupportTicket::insert($payload);

        Flash::add('success', 'New ticket added!');

        return new RedirectResponse('/framework/admin/support-tickets');
    }

    function updateTicket($id, ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        # Validate
        $v = new Valitron\Validator($payload);

        // Define validation rules
        $v->rule('required', 'title')->message('Title is required');
        $v->rule('required', 'description')->message('Description is required');
        $v->rule('required', 'priority')->message('Priority is required');
        $v->rule('required', 'status')->message('Status is required');

        // Custom rules for field values
        $v->rule('in', 'priority', ['Low', 'Medium', 'High', 'Urgent'])->message('Priority must be Low, Medium, High, or Urgent');
        $v->rule('in', 'status', ['Open', 'In Progress', 'Closed'])->message('Status must be Open, In Progress, or Closed');

        // Optional field: Tags (if applicable, you can add further validation here if needed)

        // Validate the form
        if (!$v->validate()) {
            // If validation fails, set validation errors and redirect back
            Flash::setValidationErrors($v->errors());
            return new RedirectResponse($request->getHeaderLine('Referer'));
        }

        SupportTicket::update($id, $payload);

        Flash::add('success', 'Ticket updated!');

        return new RedirectResponse('/framework/admin/support-tickets');
    }

    function deleteTicket($id)
    {
        SupportTicket::delete($id);

        Flash::add('success', 'Ticket deleted!');

        return new RedirectResponse('/framework/admin/support-tickets');
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
