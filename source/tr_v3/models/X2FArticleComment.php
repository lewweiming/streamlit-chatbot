<?php

class X2FArticleComment extends Model
{
    public static function all()
    {
        $rows = parent::$db->table('article_comments')->getAll();

        return $rows;
    }

    public static function findByTitle($title)
    {
        $result = parent::$db->table('article_comments')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext()
    {
        $results = parent::$db->select('id, title')->table('article_comments')->getAll();

        return $results;
    }

    public static function insert($payload)
    {
        parent::$db->table('article_comments')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('article_comments')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('article_comments')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('article_comments')->where('id', $id)->get();

        return $result;
    }

    public static function where($column, $value)
    {
        $results = parent::$db->table('article_comments')->where($column, $value)->getAll();
    
        return $results;
    }
}

?>