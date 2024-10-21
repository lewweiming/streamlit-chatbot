<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class X2FPagesController extends CoreController
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
        $rows = X2FPage::all();

        return $this->twig->render('admin/pages/admin.html', ['rows' => $rows]);
    }

    /* POST */
    function addPage(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $filename = $data['filename'];

        X2FPage::insert($filename);

        Flash::add('success', 'New page added!');

        return new RedirectResponse('/framework/admin/pages');
    }

    /* GET */
    function editPage(ServerRequest $request)
    {
        $data = $request->getQueryParams();

        $filename = $data['page'];

        $path = X2FPage::getFilePath($filename);

        $content = file_get_contents($path);

        return $this->twig->render('admin/pages/edit_page.html', ['filename' => $filename, 'content' => $content]);
    }

    /* 
    POST
    - Search for definition or output error that definition cannot be found
    */
    function updatePage(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        $filename = $payload['filename'];
        
        $content = $payload['content'];

        $path = X2FPage::getFilePath($filename);
        
        file_put_contents($path, $content);

        Flash::add('success', "Page: $filename updated!");    

        return new RedirectResponse('/framework/admin/pages');
    }

    function deletePage(ServerRequest $request)
    {
        $data = $request->getQueryParams();

        $filename = $data['page'];

        X2FPage::delete($filename);

        Flash::add('success', 'Page removed!');

        return new RedirectResponse('/framework/admin/pages');
    }

    /* CRUD START */
    // function insertItem(ServerRequest $request)
    // {
    //     $payload = $request->getParsedBody();

    //     X2FrameworkItem::insert($payload);

    //     Flash::add('success', 'New item added!');

    //     return new RedirectResponse('/framework/admin/main');
    // }

    // function updateItem($id, ServerRequest $request)
    // {
    //     $payload = $request->getParsedBody();

    //     X2FrameworkItem::update($id, $payload);
        
    //     foreach($payload as $key => $value) {

    //         Flash::add('success', "{$key} set to ${value}");
    //     }

    //     return new RedirectResponse('/framework/admin/main');
    // }

    
    /* CRUD END */
}
