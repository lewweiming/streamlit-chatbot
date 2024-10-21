<?php

class X2FrameworkItem extends Model
{
    // public static function all()
    // {
    //     $rows = parent::$db->table('x2_framework_items')->getAll();

    //     return $rows;
    // }

    public static function findByTitle($title)
    {
        $result = parent::$db->table('x2_framework_items')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext()
    {
        $results = parent::$db->select('id, title')->table('x2_framework_items')->getAll();

        return $results;
    }

    public static function insert($payload)
    {
        parent::$db->table('x2_framework_items')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('x2_framework_items')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('x2_framework_items')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('x2_framework_items')->where('id', $id)->get();

        return $result;
    }
}

?>