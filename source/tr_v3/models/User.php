<?php

class User extends Model
{
    public static function all()
    {
        $rows = parent::$db->select('id, email, username, status, verified, roles_mask, registered, last_login')->table('users')->getAll();

        return $rows;
    }

    public static function getAuthUserId()
    {
        $d = Delight::getAuth();
        $user_id = $d->getUserId();

        return $user_id;
    }

    public static function getAuthUser()
    {
        $d = Delight::getAuth();
        $user_id = $d->getUserId();

        $user = self::find($user_id);

        return $user;
    }

    public static function checkIfUserExistsByEmail($email)
    {
        $result = parent::$db->table('users')->where('email', $email)->get();

        return $result;
    }

    public static function findByUsername($username)
    {
        $result = parent::$db->table('users')->where('username', $username)->get();

        return $result;
    }

    public static function getFollowerCount($user_id)
    {
        $result = parent::$db->table('users_followers')->where('user_id', $user_id)->get();

        $follower_count = 0;

        if($result) {
            $follower_ids = $result->followers_ids;

            $follower_ids_array = explode(',', $follower_ids);

            $follower_count = count($follower_ids_array);
        }

        return $follower_count;
    }

    public static function getStripeCustomerId()
    {
        $d = Delight::getAuth();

        $user_id = $d->getUserId();
        
        $user = parent::$db->table('users')->where('id', $user_id)->get();

        $customer_id = null;

        if($user) {

            $customer_id = $user->stripe_customer_id;
        }

        return $customer_id;
    }

    // public static function fetchContext()
    // {
    //     $results = parent::$db->select('id, title')->table('jobs')->getAll();

    //     return $results;
    // }

    public static function insert($payload)
    {
        parent::$db->table('users')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('users')->where('id', $id)->update($payload);
    }

    // public static function delete($id)
    // {
    //     parent::$db->table('jobs')->where('id', $id)->delete();
    // }

    public static function find($id)
    {
        $result = parent::$db->table('users')->where('id', $id)->get();

        return $result;
    }
}

?>