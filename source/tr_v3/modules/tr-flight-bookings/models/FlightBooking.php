<?php

class FlightBooking extends Model
{
    public static function all()
    {
        $rows = parent::$db->table('flights_bookings')->getAll();

        return $rows;
    }
   
    public static function findByTitle($title)
    {
        $result = parent::$db->table('flights_bookings')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext($user_id)
    {
        $results = parent::$db->table('flights_bookings')->where('user_id', $user_id)->getAll();

        return $results;
    }

    public static function getNewBookingReference()
    {
        // Check if existing code refence already exist in table, if so generate new one
        $code = self::generateBookingReference();

        $code_exists = self::findWhere('booking_ref', $code);

        if(empty($code_exists)) {

            return $code;

        } else {

            self::getNewBookingReference();
        }
    }

    private static function generateBookingReference()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $referenceCode = '';
    
        for ($i = 0; $i < 7; $i++) {
            $referenceCode .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $referenceCode;
    }

    public static function insertModification($payload)
    {
        parent::$db->table('flights_bookings_modifications')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function insertCancellation($payload)
    {
        parent::$db->table('flights_bookings_cancellations')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function insert($payload)
    {
        parent::$db->table('flights_bookings')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('flights_bookings')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('flights_bookings')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('flights_bookings')->where('id', $id)->get();

        return $result;
    }

    public static function where($column, $value)
    {
        $results = parent::$db->table('flights_bookings')->where($column, $value)->getAll();
    
        return $results;
    }

    public static function findWhere($column, $value)
    {
        $result = parent::$db->table('flights_bookings')->where($column, $value)->get();
    
        return $result;
    }
}

?>