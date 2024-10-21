<?php

class UserProfile extends Model
{
    public const PROFILE_IMAGE_STORAGE_RELATIVE = 'assets/users/profile-images';

    public static function findByUserId($user_id)
    {
        $result = parent::$db->table('user_profiles')->where('user_id', $user_id)->get();

        return $result;
    }

    public static function findByUsername($username)
    {
        $result = parent::$db->table('user_profiles')->where('username', $username)->get();

        return $result;
    }

    public static function getCurrentUser()
    {
        $d = Delight::getAuth();

        $user_id = $d->getUserId();

        $result = parent::$db->table('user_profiles')->where('user_id', $user_id)->get();

        return $result;
    }

    public static function updateUsername($old_username, $new_username)
    {
        parent::$db->table('user_profiles')->where('username', $old_username)->update([
            'username' => $new_username
        ]);
    }

    public static function updateByUserId($user_id, $payload)
    {
        parent::$db->table('user_profiles')->where('user_id', $user_id)->update($payload);
    }

    // Check if row exists, create new row or update new row
    public static function update($payload)
    {
        // Validate here

        $d = Delight::getAuth();

        $user_id = $d->getUserId();

        $row = self::findByUserId($user_id);

        // Insert
        if(empty($row)) {

            // Username/ id required only on creation
            $username = $d->getUsername();

            $payload['username'] = $username;
            $payload['user_id'] = $user_id;

            self::insert($payload);

            return;

        } else {

            // Update by row id
            parent::$db->table('user_profiles')->where('user_id', $user_id)->update($payload);
        }
    }

    // Choose between update() or updateSimple()
    public static function updateSimple($payload)
    {
        $d = Delight::getAuth();

        $user_id = $d->getUserId();

        $username = $d->getUsername();

        $name = $payload['name'];

        $about_me = $payload['about_me'];

        parent::$db->query("INSERT INTO user_profiles (user_id, username, name, about_me) VALUES($user_id, '$username', '$name', '$about_me') ON DUPLICATE KEY UPDATE user_id=$user_id, username='$username', name='$name', about_me='$about_me'")->exec();
    }


    public static function getCurrentUserProfileImage($user_id)
    {
        $result = parent::$db->table('user_profiles')->where('user_id', $user_id)->get();

        if(empty($result)) {
            return null;
        }

        return $result->image;
    }


    public static function deleteProfileImage($update_table = false)
    {
        $d = Delight::getAuth();

        $user_id = $d->getUserId();

        $image = self::getCurrentUserProfileImage($user_id); // The image file

        if($image == null) {
            return false;
        }

        $path = $_SERVER['DOCUMENT_ROOT'] . self::PROFILE_IMAGE_STORAGE_RELATIVE . "/$image" ;

        if(file_exists($path)) {
            unlink($path);
            return true;
        }

        if($update_table == true) {
            self::updateByUserId($user_id, ['image' => null]);
        }
    }

    /*
    File object - Laminas\Diactoros\UploadedFile
    - Generate filename
    - Create folder
    - Move file
    - Insert database
    */
    public static function saveProfileImage($file)
    {
        $file_ext = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
        $filename = Utils::generateRandomString() . '.' . $file_ext;

        $folder = $_SERVER['DOCUMENT_ROOT'] . self::PROFILE_IMAGE_STORAGE_RELATIVE;

        ## Move File
        $file->moveTo($folder . "/$filename");

        $authId = Delight::$auth->getUserId();

        $username = Delight::$auth->getUsername();

        $image = $filename;

        parent::$db->query("INSERT INTO user_profiles (user_id, username, image) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE image=?", [$authId, $username, $image, $image])->exec();

        return;
    }
}