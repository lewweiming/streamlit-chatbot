<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class X2FileUploadController extends CoreController
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
        return $this->twig->render('framework/file_upload.html');
    }

    /* FILE UPLOADER START */
    function uploadFile(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $uploads = $request->getUploadedFiles();

        $files = X2File::saveFile($uploads['file']);

        return new JsonResponse(['message' => 'ok', 'files' => $files]);
    }

    
    /* FILE UPLOADER END */
}
?>