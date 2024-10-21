<?php

class Module extends Model
{
    // Uses Curl
    public static function getAvailableModules()
    {
        $url = 'https://x2.webconxept.com/modules/available_modules.json';

        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt($curl, CURLOPT_URL, $url); // Set the URL
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return the transfer as a string
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (optional)

        // Execute the cURL session
        $response = curl_exec($curl);

        // Check for errors
        if (curl_errno($curl)) {

            // echo curl_error($curl);
            
            return null;

        } else {
            // Save the downloaded JSON data to a file (optional)
            return json_decode($response);
        }
    }

    public static function all()
    {
        $rows = parent::$db->table('module_manager')->getAll();

        return $rows;
    }

    public static function findByTitle($title)
    {
        $result = parent::$db->table('module_manager')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext()
    {
        $results = parent::$db->select('id, title')->table('module_manager')->getAll();

        return $results;
    }

    public static function insert($payload)
    {
        parent::$db->table('module_manager')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('module_manager')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('module_manager')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('module_manager')->where('id', $id)->get();

        return $result;
    }

    public static function findWhere($column, $value)
    {
        $result = parent::$db->table('module_manager')->where($column, $value)->get();

        return $result;
    }
}
