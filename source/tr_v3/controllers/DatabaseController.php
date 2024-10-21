<?php

/**
All methods:
- home
*/

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\JsonResponse;

class DatabaseController extends CoreController
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
        return $this->twig->render('/admin/database/admin.html');
    }

    function ajaxGetTables()
    {
        $db = Database::getPdox();

        $results = (array) $db->query("SHOW TABLES")->fetchAll();

        $key = (array_keys((array)$results[0]))[0]; // Tables_in_tvjacyzerc

        $results = array_column($results, $key);

        return new JsonResponse(['message' => 'ok', 'results' => $results]);
    }

    function ajaxGetTableColumns(ServerRequest $request)
    {
        $data = $request->getQueryParams();

        $table_name = $data['table_name'];

        $db = Database::getPdox();

        $results = $db->query("DESCRIBE $table_name")->fetchAll();

        return new JsonResponse(['message' => 'ok', 'results' => $results]);
    }

    function ajaxGetTableRows(ServerRequest $request)
    {
        $data = $request->getQueryParams();

        $table_name = $data['table_name'];

        $db = Database::getPdox();

        $results = $db->select('*')->table($table_name)->getAll();

        return new JsonResponse(['message' => 'ok', 'results' => $results]);
    }

    function ajaxGetTableRowsPaginated(ServerRequest $request)
    {
        $items_per_page = 12;

        $data = $request->getQueryParams();

        $table_name = $data['table_name'];

        if(!isset($data['page'])) {
            $page = 1;
        } else {
            $page = (int) $data['page'];
        }

        $db = Database::getPdox();

        $query = $db->table($table_name);

        $clone_query = clone $query; // Clone query for counting since running get() invalidates the query for subsequent calls

        $result = $clone_query->count('id','count')->get();

        $rows = $query->pagination($items_per_page, $page)->orderBy('id desc')->getAll();

        return new JsonResponse([
            'message' => 'success',
            'count' => $result->count, // Total rows without pagination
            'rows' => $rows
        ]);
    }

    function ajaxUpdateRow(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $table_name = $data['table_name'];

        $id = $data['id'];

        $payload = json_decode($data['payload'], true);

        $db = Database::getPdox();

        $db->table($table_name)->where('id', $id)->update($payload);

        return new JsonResponse(['message' => 'ok']);
    }

    function ajaxDeleteRow(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $id = $data['id'];
        
        $table_name = $data['table_name'];

        $db = Database::getPdox();

        $db->table($table_name)->where("id", $id)->delete();

        return new JsonResponse(['message' => 'ok']);
    }
}
