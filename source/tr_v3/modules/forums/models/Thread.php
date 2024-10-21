<?php

class Thread extends Model
{
    public static function all()
    {
        $rows = parent::$db->table('forum_threads')->getAll();

        return $rows;
    }

    public static function findByTitle($title)
    {
        $result = parent::$db->table('forum_threads')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext()
    {
        $results = parent::$db->select('id, title')->table('forum_threads')->getAll();

        return $results;
    }

    public static function insert($payload)
    {
        parent::$db->table('forum_threads')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('forum_threads')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('forum_threads')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('forum_threads')->where('id', $id)->get();

        return $result;
    }
}

?>