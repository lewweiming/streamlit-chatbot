<?php

class Reply extends Model
{
    public static function all()
    {
        $rows = parent::$db->table('forum_replies')->getAll();

        return $rows;
    }

    // public static function findByTitle($title)
    // {
    //     $result = parent::$db->table('forum_replies')->where('title', $title)->get();

    //     return $result;
    // }

    public static function fetchContext()
    {
        $results = parent::$db->select('id, body')->table('forum_replies')->getAll();

        return $results;
    }

    public static function where($column, $value)
    {
        $results = parent::$db->table('forum_replies')->where($column, $value)->getAll();
    
        return $results;
    }

    public static function insert($payload)
    {
        parent::$db->table('forum_replies')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('forum_replies')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('forum_replies')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('forum_replies')->where('id', $id)->get();

        return $result;
    }
}

?>