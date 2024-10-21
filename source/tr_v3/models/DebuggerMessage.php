<?php

class DebuggerMessage extends Model
{
    public static function all()
    {
        $rows = parent::$db->table('debugger_messages')->orderBy('id', 'desc')->getAll();

        return $rows;
    }

    public static function getUnreadCount()
    {
        $count = parent::$db->table('debugger_messages')->count('*','total')->whereNull('is_read')->orWhere('is_read', 0)->get();

        return $count;
    }

    public static function findByTitle($title)
    {
        $result = parent::$db->table('debugger_messages')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext()
    {
        $results = parent::$db->select('id, title, source, debug_info, is_read, created_at')->table('debugger_messages')->orderBy('id', 'desc')->getAll();

        return $results;
    }

    public static function insert($payload)
    {
        parent::$db->table('debugger_messages')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('debugger_messages')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('debugger_messages')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('debugger_messages')->where('id', $id)->get();

        return $result;
    }
}

?>