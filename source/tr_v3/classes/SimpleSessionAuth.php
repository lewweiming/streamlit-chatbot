<?php
class SimpleSessionAuth
{
    public static function logout()
    {
        session_destroy();
    }

    public static function login($password)
    {
        if($password == ADMIN_PASSWORD_X2_FRAMEWORK) {

            $_SESSION['is_logged_in'] = true;

            return true;

        } else {

            return false;
        }
    }
}
?>