<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class X2FrameworkController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function login()
    {
        return $this->twig->render('framework/login.html');
    }

    function attemptLogout()
    {
        SimpleSessionAuth::logout();

        Flash::add('success', 'Logout successful!');    

        return new RedirectResponse('/');
    }

    function attemptLogin(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        $password = $payload['password'];
        
        $result = SimpleSessionAuth::login($password);

        if($result) {

            return new RedirectResponse('/framework/admin/main');

        } else {

            Flash::add('error', 'Incorrect password provided.');    

            return new RedirectResponse('/framework/login');
        }
    }
    
    /* DEFINITIONS START */
    function showDefinitions()
    {
        $content = file_get_contents(ENV_PATH);
        
        return $this->twig->render('framework/definitions.html', ['content' => $content]);
    }
    
    /* 
    POST
    - Search for definition or output error that definition cannot be found
    */
    function updateDefinitions(ServerRequest $request)
    {
        $payload = $request->getParsedBody();
        
        $content = $payload['content'];
        
        file_put_contents(ENV_PATH, $content);

        Flash::add('success', 'Definitions file updated!');    

        return new RedirectResponse('/framework/admin/definitions');
    }
    /* DEFINITIONS END */
    
    /* ROUTES START */
    function showRoutes()
    {
        $content = file_get_contents(ROUTES_PATH);
        
        return $this->twig->render('framework/routes.html', ['content' => $content]);
    }
    
    /* 
    POST
    */
    function updateRoutes(ServerRequest $request)
    {
        $payload = $request->getParsedBody();
        
        $content = $payload['content'];
        
        file_put_contents(ROUTES_PATH, $content);

        Flash::add('success', 'Routes file updated!');    

        return new RedirectResponse('/framework/admin/routes');
    }
    /* ROUTES END */


    /* TWIG START */
    function twigMain()
    {
        return $this->twig->render('framework/twig.html');
    }

    function twigClearCache()
    {
        FileSystem::deleteAll(TWIG_CACHE);

        Flash::add('success', 'Twig cache cleared!');

        return new RedirectResponse('/framework/admin/twig');
    }
    /* TWIG END */
}
?>