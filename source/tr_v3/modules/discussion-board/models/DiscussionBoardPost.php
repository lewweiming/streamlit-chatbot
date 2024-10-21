<?php

class DiscussionBoardPost extends Model
{
    // public static $inbox_store_name = 'user_inbox';
    // public static $store_config = ['timeout' => false];
    // private const STORAGE_RELATIVE_PATH  = '/modules/ads/assets/images';
    
    // public static function all()
    // {
    //     $rows = parent::$db->table('discussion_board_posts')->getAll();

    //     return $rows;
    // }

    public static function findByTitle($title)
    {
        $result = parent::$db->table('discussion_board_posts')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext()
    {
        $results = parent::$db->select('id, title')->table('discussion_board_posts')->getAll();

        return $results;
    }

    public static function insert($payload)
    {
        parent::$db->table('discussion_board_posts')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('discussion_board_posts')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('discussion_board_posts')->where('id', $id)->delete();
    }

    public static function deleteWhere($val, $column)
    {
        parent::$db->table('discussion_board_posts')->where($column, $val)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('discussion_board_posts')->where('id', $id)->get();

        return $result;
    }

    public static function where($column, $value)
    {
        $results = parent::$db->table('discussion_board_posts')->where($column, $value)->getAll();

        return $results;
    }
}

?>