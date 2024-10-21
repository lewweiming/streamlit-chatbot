<?php

class InboxMessage extends Model
{
    public static function all()
    {
        $rows = parent::$db->table('inbox')->orderBy('id', 'desc')->getAll();

        return $rows;
    }

    public static function findByTitle($title)
    {
        $result = parent::$db->table('inbox')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext()
    {
        $results = parent::$db->select('id, title, tags, updated_at')->table('inbox')->orderBy('id', 'desc')->getAll();

        return $results;
    }

    public static function insert($payload)
    {
        parent::$db->table('inbox')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('inbox')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('inbox')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('inbox')->where('id', $id)->get();

        return $result;
    }
}

?>