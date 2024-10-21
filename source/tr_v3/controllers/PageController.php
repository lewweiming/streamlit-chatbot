<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

/* MARKDOWN SUPPORT */
use Michelf\Markdown;

class PageController extends CoreController
{
    /*
    - Constructors in Controllers reduce boiler plate code since it makes the same core assumptions
    - The more thing loads here the slower the response time, but the less boiler plate code to write in the controller methods
    */
    public function __construct()
    {
        parent::__construct();
    }

    function getPaymentPage()
    {
        $mode = PAYPAL_MODE;

        $paypal_client_id = $mode == 'sandbox'? PAYPAL_SANBOX_CLIENT_ID:PAYPAL_LIVE_CLIENT_ID;

        return $this->twig->render('pages/paypal.html', ['mode' => $mode, 'paypal_client_id' => $paypal_client_id]);
    }

    function home()
    {
        $articles = X2FArticle::all();

        return $this->twig->render('main.html', ['articles' => $articles]);
    }

    function getPage($template)
    {
        return $this->twig->render("pages/{$template}.html");
    }

    function getPageByCategory($category, $template)
    {
        return $this->twig->render("/pages/{$category}/{$template}.html");
    }

    function getPageMarkdown(ServerRequest $request)
    {
        $data = $request->getQueryParams();

        $filename = $data['q'];

        $path_markdown = PUBLIC_ROOT . "assets/markdown/{$filename}.md";

        $html_content = Markdown::defaultTransform(file_get_contents($path_markdown));

        return $this->twig->render('pages/markdown.html', ['content' => $html_content]);
    }

    function showArticle($id)
    {
        $article = X2FArticle::find($id);

        return $this->twig->render("pages/article.html", ['article' => $article]);
    }

    function jobs()
    {
        $rows = Job::all();

        return $this->twig->render('pages/jobs.html', ['rows' => $rows]);
    }

    /* ADMIN FUNCTIONS */
    function admin()
    {
        return $this->twig->render('admin/main.html');
    }

    function adminDashboardApps()
    {
        return $this->twig->render('admin/dashboard_apps.html');
    }
    
}

?>