<?php

class CarRentalsCarV1 extends Model
{
    // public static $inbox_store_name = 'user_inbox';
    // public static $store_config = ['timeout' => false];
    // private const STORAGE_RELATIVE_PATH  = '/modules/ads/assets/images';
    
    public static function all()
    {
        $rows = parent::$db->table('car_rentals_cars_v1')->getAll();

        return $rows;
    }

    public static function findByTitle($title)
    {
        $result = parent::$db->table('car_rentals_cars_v1')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext()
    {
        $results = parent::$db->select('id, title')->table('car_rentals_cars_v1')->getAll();

        return $results;
    }

    public static function insert($payload)
    {
        parent::$db->table('car_rentals_cars_v1')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('car_rentals_cars_v1')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('car_rentals_cars_v1')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('car_rentals_cars_v1')->where('id', $id)->get();

        return $result;
    }
}

?>