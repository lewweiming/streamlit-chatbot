<?php

class DiscussionBoardCategory extends Model
{
    // public static $inbox_store_name = 'user_inbox';
    // public static $store_config = ['timeout' => false];
    // private const STORAGE_RELATIVE_PATH  = '/modules/ads/assets/images';
    
    public static function all()
    {
        $rows = parent::$db->table('discussion_board_categories')->getAll();

        return $rows;
    }

    public static function findByTitle($title)
    {
        $result = parent::$db->table('discussion_board_categories')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext()
    {
        $results = parent::$db->select('id, title')->table('discussion_board_categories')->getAll();

        return $results;
    }

    public static function insert($payload)
    {
        try {        

            parent::$db->table('discussion_board_categories')->insert($payload);
        
        } catch (\PDOException $e) {

            // Check if it's an integrity constraint violation
            if ($e->getCode() === '23000') {

                Exceptions::throwJsonException("Error: Duplicate entry found. Please use a unique value.");

            } else {
                // Handle other types of PDO exceptions
                Exceptions::throwJsonException("Database error: " . $e->getMessage());
            }
        }

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        try {        

            parent::$db->table('discussion_board_categories')->where('id', $id)->update($payload);
        
        } catch (\PDOException $e) {

            // Check if it's an integrity constraint violation
            if ($e->getCode() === '23000') {

                Exceptions::throwJsonException("Error: Duplicate entry found. Please use a unique value.");

            } else {
                // Handle other types of PDO exceptions
                Exceptions::throwJsonException("Database error: " . $e->getMessage());
            }
        }
    }

    public static function delete($id)
    {
        parent::$db->table('discussion_board_categories')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('discussion_board_categories')->where('id', $id)->get();

        return $result;
    }
}

?>