<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class CRUDController extends CoreController
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
        return $this->twig->render('framework/crud.html');
    }

    /* WHEN SUBMIT BUTTON IS CLICKED */
    function generate(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        /* VALIDATE REQUEST */
        $error = $this->validate($data);
        if($error) {
            return new RedirectResponse('/framework/admin/crud');
        }

        /* PROCEED */
        $this->generateDB($data['table_name']);
        $this->createModel($data['model_name'], $data['table_name']);
        $this->createController($data['controller_name'], $data['model_name']);
        $this->createViews($data['folder_name']);

        Flash::add('success', 'CRUD Model Generated!');

        return new RedirectResponse('/framework/admin/crud');
    }

    private function validate($data)
    {
        $error = false;

        if(empty($data['table_name'])) {
            $error = true;
            Flash::add('error', 'Please provide a table name!');
        }

        if(empty($data['model_name'])) {
            $error = true;
            Flash::add('error', 'Please provide a model name!');
        }

        if(empty($data['controller_name'])) {
            $error = true;
            Flash::add('error', 'Please provide a controller name!');
        }

        if(empty($data['folder_name'])) {
            $error = true;
            Flash::add('error', 'Please provide a folder name!');
        }

        return $error;
    }

    /*
    - Creates a model in /models folder
    - Copies the _CRUD_MODEL.php file in /models
    */
    private function createModel($model_name, $table_name)
    {
        $source = PUBLIC_ROOT . 'models/_CRUD_MODEL.php';
        $destination = PUBLIC_ROOT . "models/{$model_name}.php";
        copy($source, $destination);

        $contents = file_get_contents($destination);
        $contents = str_replace("X2FrameworkItem", $model_name, $contents);
        $contents = str_replace("x2_framework_items", $table_name, $contents);
        file_put_contents($destination, $contents);
    }

    /*
    - Creates a controller in /controllers folder
    - Copies the _CRUD_CONTROLLER.php file in /controllers
    */
    private function createController($controller_name, $model_name)
    {
        $source = PUBLIC_ROOT . 'controllers/_CRUD_CONTROLLER.php';
        $destination = PUBLIC_ROOT . "controllers/{$controller_name}.php";
        copy($source, $destination);

        $contents = file_get_contents($destination);
        $contents = str_replace("X2FrameworkController", $controller_name, $contents);
        $contents = str_replace("X2FrameworkItem", $model_name, $contents);
        file_put_contents($destination, $contents);
    }

    /*
    - Creates views in /views/admin folder
    - Copies the view files in /admin/_CRUD_VIEWS
    */
    private function createViews($folder_name)
    {
        $folder_path = PUBLIC_ROOT . "views/admin/{$folder_name}";

        if(!file_exists($folder_path)) {
            mkdir($folder_path);
            chmod($folder_path, 0775);
        }

        $files = ['admin.html','edit_item.html'];
        foreach($files as $file) {
            $source = PUBLIC_ROOT . "views/admin/_CRUD_VIEWS/{$file}";
            $destination = PUBLIC_ROOT . "views/admin/{$folder_name}/{$file}";
            copy($source, $destination);
        }
    }

    /*
    - Create CRUD Database
    */
    private function generateDB($table_name)
    {
        
        $db = Database::getPdox();
        $db->query("
        CREATE TABLE `$table_name` (
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `title` varchar(255) DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ")->exec();
    }

    // function previewArticle($id)
    // {
    //     $article = X2FrameworkArticle::find($id);

    //     $parser = new Parsedown();

    //     $html_content = $parser->text($article->markdown_content); 

    //     return $this->twig->render('framework/preview_article.html', ['article' => $article, 'content' => $html_content]);
    // }

    // function editArticle($id)
    // {
    //     $article = X2FrameworkArticle::find($id);

    //     return $this->twig->render('framework/edit_article.html', ['article' => $article]);
    // }

    /* CRUD START */
    // function insertArticle(ServerRequest $request)
    // {
    //     $payload = $request->getParsedBody();

    //     X2FrameworkArticle::insert($payload);

    //     Flash::add('success', 'New article added!');

    //     return new RedirectResponse('/framework/admin/main');
    // }

    // function updateArticle($id, ServerRequest $request)
    // {
    //     $payload = $request->getParsedBody();

    //     X2FrameworkArticle::update($id, $payload);
        
    //     foreach($payload as $key => $value) {

    //         Flash::add('success', "{$key} set to ${value}");
    //     }

    //     return new RedirectResponse('/framework/admin/main');
    // }

    // function deleteArticle($id)
    // {
    //     X2FrameworkArticle::delete($id);

    //     Flash::add('success', 'Article removed!');

    //     return new RedirectResponse('/framework/admin/main');
    // }
    /* CRUD END */
}
?>