<?php

class ShopInventory extends Model
{
    // public static $inbox_store_name = 'user_inbox';
    // public static $store_config = ['timeout' => false];
    // private const STORAGE_RELATIVE_PATH  = '/modules/ads/assets/images';
    
    public static function all()
    {
        $rows = parent::$db->table('shop_inventory')->getAll();

        return $rows;
    }

    public static function findByTitle($title)
    {
        $result = parent::$db->table('shop_inventory')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext()
    {
        $results = parent::$db->select('id, name')->table('shop_inventory')->getAll();

        return $results;
    }

    public static function insert($payload)
    {
        parent::$db->table('shop_inventory')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('shop_inventory')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('shop_inventory')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('shop_inventory')->where('id', $id)->get();

        return $result;
    }
}

?>