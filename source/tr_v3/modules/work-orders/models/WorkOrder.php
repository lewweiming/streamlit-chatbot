<?php

class WorkOrder extends Model
{
    public static function all()
    {
        $rows = parent::$db->table('work_orders')->getAll();

        $truncate_limit = 100; // 100 chars long

        foreach ($rows as &$row) {

            // Check if the description exceeds the limit and truncate with ellipsis
            if (strlen($row->description) > $truncate_limit) {

                $row->description = substr($row->description, 0, $truncate_limit) . '...';
            }
        }

        return $rows;
    }

    public static function findByTitle($title)
    {
        $result = parent::$db->table('work_orders')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext($user_id)
    {
        $results = parent::$db->table('work_orders')->where('user_id', $user_id)->getAll();

        return $results;
    }

    public static function insert($payload)
    {
        parent::$db->table('work_orders')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('work_orders')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('work_orders')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('work_orders')->where('id', $id)->get();

        return $result;
    }
}

?>