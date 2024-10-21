<?php

/*
The payment interface captures all payments made to Paypal or Stripe.
*/

class CashierReceipt extends Model
{
    public static function exists($id)
    {
        // Query to check if the record exists
        $result = parent::$db->table('cashier_receipts')->where('id', $id)->get();

        // Check if a result was found and return true, otherwise return false
        return !empty($result);
    }

    public static function insert($payload)
    {
        parent::$db->table('cashier_receipts')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function all()
    {
        $rows = parent::$db->table('cashier_receipts')->getAll();

        return $rows;
    }

    public static function find($id)
    {
        $result = parent::$db->table('cashier_receipts')->where('id', $id)->get();

        return $result;
    }

    public static function where($column, $value)
    {
        $results = parent::$db->table('cashier_receipts')->where($column, $value)->getAll();

        return $results;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('cashier_receipts')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('cashier_receipts')->where('id', $id)->delete();
    }

    /*
    Create a PDF receipt
    */
    public static function generateReceipt()
    {

    }
}

?>