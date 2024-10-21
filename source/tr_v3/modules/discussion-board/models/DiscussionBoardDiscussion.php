<?php

class DiscussionBoardDiscussion extends Model
{
    // public static $inbox_store_name = 'user_inbox';
    // public static $store_config = ['timeout' => false];
    // private const STORAGE_RELATIVE_PATH  = '/modules/ads/assets/images';
    
    public static function all()
    {
        $rows = parent::$db->table('discussion_board_discussions')->getAll();

        return $rows;
    }

    public static function findByTitle($title)
    {
        $result = parent::$db->table('discussion_board_discussions')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext()
    {
        $results = parent::$db->select('id, title')->table('discussion_board_discussions')->getAll();

        return $results;
    }

    public static function insert($payload)
    {
        parent::$db->table('discussion_board_discussions')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('discussion_board_discussions')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('discussion_board_discussions')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('discussion_board_discussions')->where('id', $id)->get();

        return $result;
    }
}

?>