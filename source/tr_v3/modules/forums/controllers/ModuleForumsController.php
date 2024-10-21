<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class ModuleForumsController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function showThreads()
    {
        $threads = Thread::all();

        return $this->twig->render('forums/views/threads.html', ['threads' => $threads]);
    }

    function showThread($id)
    {
        $thread = Thread::find($id);

        $replies = Reply::where('thread_id', $thread->id);

        return $this->twig->render("forums/views/thread.html", ['thread' => $thread, 'replies' => $replies]);
    }

    function createThread()
    {
        return $this->twig->render("forums/views/create_thread.html");
    }

    function postThread(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        Thread::insert($payload);
        
        Flash::add('success', 'New thread added!');

        return new RedirectResponse('/forum/threads');
    }

    function postReply($id, ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        $payload['thread_id'] = $id;

        Reply::insert($payload);
        
        Flash::add('success', 'New reply added!');

        return new RedirectResponse("/forum/thread/$id");
    }

    function admin()
    {
        $rows = X2FrameworkItem::fetchContext();

        return $this->twig->render('framework/admin.html', ['rows' => $rows]);
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