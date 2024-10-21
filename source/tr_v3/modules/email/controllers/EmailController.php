<?php

/**
All methods:
- home
 */

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class EmailController extends CoreController
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
        $rows = X2FrameworkItem::fetchContext();

        return $this->twig->render('framework/admin.html', ['rows' => $rows]);
    }

    function adminTemplatesShow()
    {
        return $this->twig->render('email/views/admin/templates.html');
    }

    function adminDebugShow()
    {
        $folder = $_SERVER['DOCUMENT_ROOT'] . 'modules/email/views/emails/templates/debug/';
        $files = array_diff(scandir($folder), array('..', '.'));

        return $this->twig->render('email/views/admin/debug.html', ['files' => $files]);
    }

    function adminSendShow()
    {
        return $this->twig->render('email/views/admin/send.html');
    }

    function adminSendPost(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $has_errors = false;

        # Validate
        if (!isset($data['recipient'])) {
            Flash::add('error', 'Recipient must be provided');
            $has_errors = true;
        }

        if (filter_var($data['recipient'], FILTER_VALIDATE_EMAIL) == false) {
            Flash::add('error', 'Valid recipient email must be provided');
            $has_errors = true;
        }

        if (!isset($data['subject'])) {
            Flash::add('error', 'Subject must be provided');
            $has_errors = true;
        }

        if (!isset($data['html'])) {
            Flash::add('error', 'HTML must be provided');
            $has_errors = true;
        }

        if ($has_errors) {

            return new RedirectResponse('/framework/admin/email/send');
        }

        # Run
        $payload = [
            'to_email' => $data['recipient'],
            'subject' => $data['subject'],
            'message_html' => $data['html'],
        ];

        PHPMailerX2F::send($payload);


        Flash::add('success', 'Email sent!');

        return new RedirectResponse('/framework/admin/email/send');
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
