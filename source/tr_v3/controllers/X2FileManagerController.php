<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class X2FileManagerController extends CoreController
{
    function fileManager()
    {
        return $this->twig->render('framework/file_manager.html');
    }

    /*
    - Returns files and folders separately
    */
    function ajaxScanFolder(ServerRequest $request)
    {
        $data = $request->getQueryParams();

        $relative_path = '/';

        if(isset($data['path'])) {

            $relative_path = $data['path']; // I.e /assets/folder
        }

        $path = PUBLIC_ROOT . $relative_path;

        $scan = array_diff(scandir($path), array('..', '.'));

        $files = [];

        $folders = [];

        foreach($scan as $i)
        {
            if(!is_dir(PUBLIC_ROOT . $relative_path . "/$i"))
            {
                $files[] = $i;

            } else {

                $folders[] = $i;
            }
        }

        return new JsonResponse(['message' => 'ok', 'path' => $relative_path, 'files' => $files, 'folders' => $folders]);
    }

    /*
    - Takes in the relative path of a file and removes it
    */
    function ajaxDeleteFile(ServerRequest $request)
    {
        $data = json_decode((string)$request->getBody(), true);

        if(!isset($data['path'])) {
            Exceptions::throwJsonException("Path not found");
        }

        $path = PUBLIC_ROOT . $data['path'];

        if(!file_exists($path)) {
            Exceptions::throwJsonException("No file found at specified path: {$path}");
        }

        unlink($path);

        return new JsonResponse(['message' => 'ok']);
    }

    /*
    - Add new file to specified relative path
    */
    function ajaxAddFile(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        if(empty($data['path'])) {
            Exceptions::throwJsonException("Folder path cannot be empty");
        }

        $relative_path = $data['path']; // I.e /assets/folder/new_file.ext

        $path = PUBLIC_ROOT . $relative_path;

        if(file_exists($path)) {
            Exceptions::throwJsonException("File already exists: {$path}");
        }

        file_put_contents($path, '');

        return new JsonResponse(['message' => 'ok']);
    }

    /*
    - Updates an existing file
    */
    function ajaxUpdateFile(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        if(empty($data['path'])) {
            Exceptions::throwJsonException("Folder path cannot be empty");
        }

        $relative_path = $data['path']; // I.e /assets/folder/new_file.ext

        $path = PUBLIC_ROOT . $relative_path;

        if(!file_exists($path)) {
            Exceptions::throwJsonException("File does not exists: {$path}");
        }

        $content = $data['content'];

        file_put_contents($path, $content);

        return new JsonResponse(['message' => 'ok']);
    }

    /*
    - Add new folder to specified relative path
    */
    function ajaxAddFolder(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        if(empty($data['path'])) {
            Exceptions::throwJsonException("Folder path cannot be empty");
        }

        $relative_path = $data['path']; // I.e /assets/new_folder

        $folder = PUBLIC_ROOT . $relative_path;

        if(file_exists($folder)) {
            Exceptions::throwJsonException("Folder already exists: {$folder}");
        }

        mkdir($folder);
        chmod($folder, 0775);

        return new JsonResponse(['message' => 'ok']);
    }

    function ajaxRemoveFolder(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        if(empty($data['path'])) {
            Exceptions::throwJsonException("Folder path cannot be empty");
        }

        $folder = PUBLIC_ROOT . $data['path']; // I.e /assets/existing_folder

        if(!self::is_dir_empty($folder)) {
            Exceptions::throwJsonException("Folder path must be empty: {$folder}");
        }

        rmdir($folder);

        return new JsonResponse(['message' => 'ok']);

    }

    /*
    - Uploads files at specified relative path
    */
    function ajaxUpload(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $relative_path = $data['path']; // I.e /assets/folder

        if(!file_exists(PUBLIC_ROOT . $relative_path)) {
            Exceptions::throwJsonException("No such folder exists: {$relative_path}");
        }

        $uploads = $request->getUploadedFiles();

        $files = self::saveFiles($uploads['file'], $relative_path);

        return new JsonResponse(['message' => 'ok', 'files' => $files]);
    }

    /*
    - Rename a file / folder
    */
    function ajaxRename(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        if(!isset($data['path_old'])) {
            Exceptions::throwJsonException("Old Path not found");
        }

        if(!isset($data['path_new'])) {
            Exceptions::throwJsonException("New Path not found");
        }

        $path_old = PUBLIC_ROOT . $data['path_old'];
        $path_new = PUBLIC_ROOT . $data['path_new'];

        if(!file_exists($path_old)) {
            Exceptions::throwJsonException("Existing path not found: {$path_old}");
        }

        rename($path_old, $path_new);

        return new JsonResponse(['message' => 'ok']);
    }

    /*
    - Get contents of specified path
    */
    function ajaxFetchFileContent(ServerRequest $request)
    {
        $data = $request->getQueryParams();

        $relative_path = $data['path'];

        $path = PUBLIC_ROOT . $relative_path;

        if(!file_exists($path)) {
            Exceptions::throwJsonException("Invalid path: {$path}");
        }

        $content = file_get_contents($path);

        return new JsonResponse(['message' => 'ok', 'content' => $content]);
    }

    /*
    Array of file objects - Laminas\Diactoros\UploadedFile
    - Move file
    */
    private static function saveFiles(array $files, $relative_path)
    {
        $results = [];

        foreach ($files as $file) {

            $filename = $file->getClientFilename();

            $folder = PUBLIC_ROOT . "{$relative_path}";

            ## Move File
            $file->moveTo($folder . "/$filename");

            ## Output as result set
            $results[] = $filename;
        }

        return $results;
    }

    private static function is_dir_empty($dir)
    {
        if (!is_readable($dir)) return null; 
        return (count(scandir($dir)) == 2);
    }
}