<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class InboxController extends CoreController
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
        $rows = InboxMessage::fetchContext();

        return $this->twig->render('admin/inbox/admin.html', ['rows' => $rows]);
    }

    function previewMessage($id)
    {
        $article = InboxMessage::find($id);

        $parser = new Parsedown();

        $html_content = $parser->text($article->markdown_content); 

        return $this->twig->render('admin/inbox/preview_article.html', ['article' => $article, 'content' => $html_content]);
    }

    function editMessage($id)
    {
        $article = InboxMessage::find($id);

        return $this->twig->render('admin/inbox/edit_article.html', ['article' => $article]);
    }

    /* CRUD START */
    function insertMessage(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        InboxMessage::insert($payload);

        Flash::add('success', 'New message added!');

        return new RedirectResponse('/framework/admin/inbox/main');
    }

    function updateMessage($id, ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        InboxMessage::update($id, $payload);
        
        foreach($payload as $key => $value) {

            Flash::add('success', "{$key} set to ${value}");
        }

        return new RedirectResponse('/framework/admin/inbox/main');
    }

    function deleteMessage($id)
    {
        InboxMessage::delete($id);

        Flash::add('success', 'Message removed!');

        return new RedirectResponse('/framework/admin/inbox/main');
    }
    /* CRUD END */
}
?>