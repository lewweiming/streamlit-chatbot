<?php

class X2FArticle extends Model
{
    public static function all()
    {
        $rows = parent::$db->table('x2_framework_articles')->getAll();

        return $rows;
    }

    public static function findByTitle($title)
    {
        $result = parent::$db->table('x2_framework_articles')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext()
    {
        $results = parent::$db->select('id, title, tags, updated_at')->table('x2_framework_articles')->getAll();

        return $results;
    }

    public static function insert($payload)
    {
        parent::$db->table('x2_framework_articles')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('x2_framework_articles')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('x2_framework_articles')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('x2_framework_articles')->where('id', $id)->get();

        return $result;
    }

    public static function getArticleFiles($id)
    {
        $path = X2_ARTICLES_ASSETS_STORAGE . "/$id/files";

        $files = [];

        if(file_exists($path)) {

            $files = array_values(array_diff(scandir($path), array('..', '.')));
        }

        return $files;
    }

    public static function removeFile($filename, $articleId)
    {
        $path = X2_ARTICLES_ASSETS_STORAGE . "/$articleId/files/$filename";

        unlink($path);
    }

    /*
    Array of file objects - Laminas\Diactoros\UploadedFile
    - Create folder
    - Move file
    */
    public static function saveFile(array $files, $folderId)
    {
        $filesOut = [];

        foreach ($files as $file) {

            $filename = $file->getClientFilename();

            $folder = X2_ARTICLES_ASSETS_STORAGE . "/$folderId/files";

            ## Create folder
            if (!file_exists($folder)) {
                mkdir($folder, 0775, true);
                chmod($folder, 0775);
            }

            ## Move File
            $file->moveTo($folder . "/$filename");

            ## Optionally Insert into Image Database Table
            // $asset_path = CATALOGUE_IMAGE_STORAGE_RELATIVE . "/{$item_id}/{$filename}";
            // $lastId = CatalogueItemImage::insert([
            //     'path' => $asset_path,
            //     'filename' => $filename,
            //     'item_id' => $item_id
            // ]);

            ## Output as result set

            $filesOut[] = [
                // 'id' => $lastId,
                'path' => $folder,
                'filename' => $filename,
                'created_at' => date('Y-m-d H:i:s')
            ];
        }

        return $filesOut;
    }    

    /*** IMAGE START ***/
    public static function getArticleImages($id)
    {
        $path = X2_ARTICLES_ASSETS_STORAGE . "/$id/images";

        $files = [];

        if(file_exists($path)) {

            $files = array_values(array_diff(scandir($path), array('..', '.')));
        }

        return $files;
    }

    public static function removeImage($filename, $articleId)
    {
        $path = X2_ARTICLES_ASSETS_STORAGE . "/$articleId/images/$filename";

        unlink($path);
    }

    /*
    Array of file objects - Laminas\Diactoros\UploadedFile
    - Create folder
    - Move file
    */
    public static function saveImage(array $files, $folderId)
    {
        $filesOut = [];

        foreach ($files as $file) {

            /** You can also change the uploaded file name like so **/

            // $clientFilename = $file->getClientFilename();

            // $fileExtension = pathinfo($clientFilename, PATHINFO_EXTENSION);

            // $saved_filename = (string)hexdec(uniqid()) . '.' . $fileExtension;

            $filename = $file->getClientFilename();

            $folder = X2_ARTICLES_ASSETS_STORAGE . "/$folderId/images";

            ## Create folder
            if (!file_exists($folder)) {
                mkdir($folder, 0775, true);
                chmod($folder, 0775);
            }

            ## Move File
            $file->moveTo($folder . "/$filename");

            ## Optionally Insert into Image Database Table
            // $asset_path = CATALOGUE_IMAGE_STORAGE_RELATIVE . "/{$item_id}/{$filename}";
            // $lastId = CatalogueItemImage::insert([
            //     'path' => $asset_path,
            //     'filename' => $filename,
            //     'item_id' => $item_id
            // ]);

            ## Output as result set

            $filesOut[] = [
                // 'id' => $lastId,
                'path' => $folder,
                'filename' => $filename,
                'created_at' => date('Y-m-d H:i:s')
            ];
        }

        return $filesOut;
    }  
    /*** IMAGE END ***/
}

?>