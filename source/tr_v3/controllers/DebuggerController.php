<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class DebuggerController extends CoreController
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
        $rows = DebuggerMessage::fetchContext();

        return $this->twig->render('admin/debugger/admin.html', ['rows' => $rows]);
    }

    function ajaxMarkIsRead($id)
    {
        DebuggerMessage::update($id, [
            'is_read' => 1
        ]);

        return;
    }

    /* CRUD START */

    function deleteMessage($id)
    {
        DebuggerMessage::delete($id);

        Flash::add('success', 'Message removed!');

        return new RedirectResponse('/framework/admin/debugger/main');
    }
    /* CRUD END */
}
?>