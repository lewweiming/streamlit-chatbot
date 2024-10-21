<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class X2UserController extends CoreController
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
        $rows = X2User::fetchContext();

        return $this->twig->render('framework/users/admin.html', ['rows' => $rows]);
    }

    function delete($id)
    {
        X2User::delete($id);

        Flash::add('success', 'User removed!');

        return new RedirectResponse('/framework/admin/users');
    }
    /* CRUD END */
}
?>