<?php

/**
All methods:
- home
 */

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class X2ArticlesController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function articles()
    {
        $items = X2FArticle::all();

        return $this->twig->render('pages/articles.html', ['items' => $items]);
    }

    function admin()
    {
        return $this->twig->render('framework/dashboard/articles/index.html');
    }

    function comments($id)
    {
        $article = X2FArticle::find($id);

        return $this->twig->render('framework/dashboard/articles/comments.html', ['article' => $article]);
    }

    function createArticle()
    {
        return $this->twig->render('framework/dashboard/articles/add_article.html');
    }

    // function markdown(ServerRequest $request)
    // {
    //     $data = $request->getQueryParams();

    //     $template = $data['template'];

    //     $path_markdown = PUBLIC_ROOT . "/assets/x2-framework/templates/{$template}.md";

    //     $parser = new Parsedown();

    //     $html_content = $parser->text(file_get_contents($path_markdown)); 

    //     return $this->twig->render('framework/markdown.html', ['content' => $html_content]);
    // }

    function article($id)
    {
        $article = X2FArticle::find($id);

        $parser = new Parsedown();

        $html_content = $parser->text($article->markdown_content);

        return $this->twig->render('pages/article.html', ['article' => $article, 'content' => $html_content]);
    }

    function previewArticle($id)
    {
        $article = X2FArticle::find($id);

        $parser = new Parsedown();

        $html_content = $parser->text($article->markdown_content);

        return $this->twig->render('framework/preview_article.html', ['article' => $article, 'content' => $html_content]);
    }

    function editArticle($id)
    {
        $article = X2FArticle::find($id);

        $images = X2FArticle::getArticleImages($id);

        return $this->twig->render('/framework/dashboard/articles/edit_article.html', ['article' => $article, 'images' => $images]);
    }

    /*** FILES EXTENSION START ***/
    function editArticleFiles($id)
    {
        $article = X2FArticle::find($id);

        $files = X2FArticle::getArticleFiles($id);

        return $this->twig->render('framework/edit_files.html', ['article' => $article, 'files' => $files]);
    }

    function removeFile($id, ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $filename = $data['filename'];

        X2FArticle::removeFile($filename, $id);

        return new JsonResponse(['message' => 'ok']);
    }


    function uploadFile($id, ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $uploads = $request->getUploadedFiles();

        $files = X2FArticle::saveFile($uploads['file'], $id);

        return new JsonResponse(['message' => 'ok', 'files' => $files]);
    }
    /*** FILES EXTENSION END ***/

    /*** IMAGES EXTENSION START ***/
    function editArticleImages($id)
    {
        $article = X2FArticle::find($id);

        $files = X2FArticle::getArticleImages($id);

        return $this->twig->render('framework/dashboard/articles/edit_images.html', ['article' => $article, 'files' => $files]);
    }

    function removeImage($id, ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $filename = $data['filename'];

        X2FArticle::removeImage($filename, $id);

        return new JsonResponse(['message' => 'ok']);
    }


    function uploadImage($id, ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $uploads = $request->getUploadedFiles();

        $files = X2FArticle::saveImage($uploads['file'], $id);

        return new JsonResponse(['message' => 'ok', 'files' => $files]);
    }

    /*
    - Accepts a path and updates the row
    */
    function ajaxSetItemImageThumbnail(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $id = $data['article_id'];

        $path = $data['path'];

        X2FArticle::update($id, [
            'thumbnail_path' => $path
        ]);

        return new JsonResponse(['message' => 'ok']);
    }
    /*** IMAGES EXTENSION END ***/

    /* CRUD START */
    function insertArticle(ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        X2FArticle::insert($payload);

        Flash::add('success', 'New article added!');

        return new RedirectResponse('/framework/admin/articles');
    }

    function updateArticle($id, ServerRequest $request)
    {
        $payload = $request->getParsedBody();

        X2FArticle::update($id, $payload);

        foreach ($payload as $key => $value) {

            Flash::add('success', "{$key} set to ${value}");
        }

        return new RedirectResponse('/framework/admin/articles');
    }

    function deleteArticle($id)
    {
        X2FArticle::delete($id);

        Flash::add('success', 'Article removed!');

        return new RedirectResponse('/framework/admin/main');
    }
    /* CRUD END */
}
