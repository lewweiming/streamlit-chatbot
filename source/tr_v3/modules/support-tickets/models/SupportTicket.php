<?php

class SupportTicket extends Model
{
    public static function all()
    {
        $rows = parent::$db->table('support_tickets')->getAll();

        return $rows;
    }
    
    public static function userOwnsProject($id, $user_id)
    {
        $result = parent::$db->table('support_tickets')->select('id')->where('id', $id)->where('user_id', $user_id)->get();

        return empty($result)?false:true;
    }

    public static function findByTitle($title)
    {
        $result = parent::$db->table('support_tickets')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext($user_id)
    {
        $results = parent::$db->table('support_tickets')->where('user_id', $user_id)->getAll();

        return $results;
    }

    public static function insert($payload)
    {
        parent::$db->table('support_tickets')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('support_tickets')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('support_tickets')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('support_tickets')->where('id', $id)->get();

        return $result;
    }
}

?>