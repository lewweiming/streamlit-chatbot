<?php

class X2User extends Model
{
    // public static function all()
    // {
    //     $rows = parent::$db->table('users')->getAll();

    //     return $rows;
    // }

    // public static function findByTitle($title)
    // {
    //     $result = parent::$db->table('users')->where('title', $title)->get();

    //     return $result;
    // }

    public static function fetchContext()
    {
        $results = parent::$db->select('id, email, username')->table('users')->getAll();

        return $results;
    }

    public static function insert($payload)
    {
        parent::$db->table('users')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('users')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('users')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('users')->where('id', $id)->get();

        return $result;
    }
}

?>