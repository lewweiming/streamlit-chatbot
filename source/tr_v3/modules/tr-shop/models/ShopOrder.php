<?php

class ShopOrder extends Model
{
    public static function all()
    {
        $rows = parent::$db->table('shop_orders')->getAll();

        return $rows;
    }
   
    public static function findByTitle($title)
    {
        $result = parent::$db->table('shop_orders')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext($user_id)
    {
        $results = parent::$db->table('shop_orders')->where('user_id', $user_id)->getAll();

        return $results;
    }

    public static function getNewOrderReference()
    {
        // Check if existing code refence already exist in table, if so generate new one
        $code = self::generateOrderReference();

        $code_exists = self::findWhere('order_ref', $code);

        if(empty($code_exists)) {

            return $code;

        } else {

            self::getNewOrderReference();
        }
    }

    private static function generateOrderReference()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $referenceCode = '';
    
        for ($i = 0; $i < 7; $i++) {
            $referenceCode .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $referenceCode;
    }

    public static function getModificationsByOrderId($id)
    {
        $rows = parent::$db->table('shop_order_modifications')->where('order_id', $id)->getAll();

        return $rows;
    }

    public static function insertModification($payload)
    {
        parent::$db->table('shop_order_modifications')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function insertCancellation($payload)
    {
        parent::$db->table('shop_order_cancellations')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function insertConfirmation($payload)
    {
        parent::$db->table('shop_order_confirmations')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function insert($payload)
    {
        parent::$db->table('shop_orders')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('shop_orders')->where('order_id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('shop_orders')->where('order_id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('shop_orders')->where('order_id', $id)->get();

        return $result;
    }

    public static function where($column, $value)
    {
        $results = parent::$db->table('shop_orders')->where($column, $value)->getAll();
    
        return $results;
    }

    public static function findWhere($column, $value)
    {
        $result = parent::$db->table('shop_orders')->where($column, $value)->get();
    
        return $result;
    }
}

?>