<?php

class X2File extends Model
{
    /* Parse $_FILES['files'] into file objects for easier referencing */
    public static function parseFiles($f)
    {

        // Initialize the array to store file objects
        $fileObjects = [];

        // Loop through each uploaded file
        foreach ($f['name'] as $key => $clientFilename) {

            // Create a file object for each file
            $fileObject = new stdClass();
            $fileObject->clientFilename = $clientFilename;
            $fileObject->tmpFilePath = $f['tmp_name'][$key];
            $fileObject->fileSize = $f['size'][$key];
            $fileObject->fileType = $f['type'][$key];

            // Add the file object to the array
            $fileObjects[] = $fileObject;
        }

        return $fileObjects;
    }

    /* Parse $_FILES['file'] into file object for easier referencing */
    public static function parseFile($f)
    {
        // Create a file object for uploaed file
        $fileObject = new stdClass();
        $fileObject->clientFilename = $f['name'];
        $fileObject->tmpFilePath = $f['tmp_name'];
        $fileObject->fileSize = $f['size'];
        $fileObject->fileType = $f['type'];

        return $fileObject;
    }  

    /*
    Array of file objects - Laminas\Diactoros\UploadedFile
    - Create folder
    - Move file
    - Insert database
    */
    public static function saveFile(array $files)
    {
        $results = [];

        foreach ($files as $file) {

            $filename = $file->getClientFilename();

            $folder = X2_UPLOADS_STORAGE;

            ## Create folder
            if (!file_exists($folder)) {
                mkdir($folder);
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
            $results[] = [
                // 'id' => $lastId,
                // 'path' => $asset_path,
                'filename' => $filename,
                'created_at' => date('Y-m-d H:i:s')
            ];
        }

        return $results;
    }
}
