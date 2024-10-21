<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class DiscussionBoardController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function main()
    {
        $rows = DiscussionBoardDiscussion::all();

        $categories = DiscussionBoardCategory::all();

        return $this->twig->render('discussion-board/views/discussion_board.html', ['rows' => $rows, 'categories' => $categories]);
    }

    function addDiscussion()
    {
        return $this->twig->render('discussion-board/views/add_discussion.html');
    }

    function submitDiscussion(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        DiscussionBoardDiscussion::insert($payload);

        Flash::add('success', 'New discussion added!');

        return new RedirectResponse('/discussion-board');
    }

    function submitReply($discussion_id, ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        DiscussionBoardPost::insert($payload);

        Flash::add('success', 'New reply added!');

        return new RedirectResponse("/discussion-board/discussions/$discussion_id");
    }

    function deleteReply($discussion_id, $reply_id)
    {
        DiscussionBoardPost::delete($reply_id);

        Flash::add('success', 'Reply removed!');

        return new RedirectResponse("/discussion-board/discussions/$discussion_id");
    }    

    function showDiscussion($discussion_id)
    {
        $discussion = DiscussionBoardDiscussion::find($discussion_id);

        $posts = DiscussionBoardPost::where('discussion_id', $discussion_id);

        return $this->twig->render('discussion-board/views/join_discussion.html', ['discussion' => $discussion, 'posts' => $posts]);
    }

    function admin()
    {
        return $this->twig->render('discussion-board/views/admin/index.html');
    }

    function manageCategories()
    {
        return $this->twig->render('discussion-board/views/admin/manage_categories.html');
    }

    function manageDiscussions()
    {
        return $this->twig->render('discussion-board/views/admin/manage_discussions.html');
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