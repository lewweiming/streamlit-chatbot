<?php

/*
Extends the Database Class
*/

class Delight extends Database
{
    use ExceptionsTrait;

    public static $auth; // Delight Auth Instance

    /* Returns a shared instance of Delight using Singleton approach so that prepare_authentication is only called once */
    public static function getAuth()
    {
        if (self::$auth === null)
            self::$auth = self::prepare_authentication();
        return self::$auth;
    }

    public static function isAdmin()
    {
        $d = self::getAuth();

        $is_admin = $d->hasRole(\Delight\Auth\Role::SUPER_ADMIN);
        
        return $is_admin;
    }

    public static function isUser()
    {
        $d = self::getAuth();

        $is_user = $d->isLoggedIn();
        
        return $is_user;
    }

    public static function isAuthenticated()
    {
        $d = self::getAuth();
        return $d->isLoggedIn();
    }

    public static function impersonateLogin($userId)
    {
        $d = self::getAuth();

        try {
            $d->admin()->logInAsUserById($userId);
        }
        catch (\Delight\Auth\UnknownIdException $e) {
            $message = 'Unknown ID';
            Exceptions::throwJsonException($message);
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            $message = 'Email address not verified';
            Exceptions::throwJsonException($message);
        }        
    }

    /* 
    - Assumes user_profiles table has been created 
    - Makes a DB connection
    */
    // public function getProfileImage()
    // {
        
    //     if(!$this->auth->isLoggedIn()) {
    //         return null;
    //     }

    //     # Init Embryo
    //     $database = new Embryo\PDO\Database(Database::embryo_init());
    //     $pdo = $database->connection('local');

    //     # Fetch posts joined table with users
    //     $result = $pdo->table('user_profiles')
    //     ->where('user_id', $this->auth->getUserId())
    //     ->select('image_path')
    //     ->get();

    //     return $result->image_path;
    // }

    public static function changeEmail($old, $new)
    {
        $d = self::getAuth();
        
        ## Validate email
        ## Returns the filtered data, or FALSE if the filter fails.
        if(!filter_var($new, FILTER_VALIDATE_EMAIL)) {
            $message = 'Invalid email';
            return $message;
        }

        ## Validate check that old email and new email are different
        if($old == $new) {
            $message = 'New email cannot be the same as old email';
            return $message;
        }

        ## Validate check that email is unique
        if(User::checkIfUserExistsByEmail($new)) {
            $message = 'A user has been found with the same email address';
            return $message;
        }

        $d = self::getAuth();

        $db = Database::getPdox();

        $data = [
            'email' => $new
        ];

        $db->table('users')->where('email', $old)->update($data);

        return;
       
    }

    public static function changeUsername($old, $new)
    {
         ## Validate username // Between 5 to 15 alphanumeric chars
         if(!preg_match('/^[A-Za-z0-9]{5,15}$/', $new)) {
            $message = 'Invalid username';
            return $message;
        }

        ## Validate check that old username and new username are different
        if($old == $new) {
            $message = 'New username cannot be the same as old username';
            return $message;
        }

        $d = self::getAuth();

        $db = Database::getPdox();

        $data = [
            'username' => $new
        ];
        
        $db->table('users')->where('username', $old)->update($data);

        // Also update session data for current user session
        $_SESSION['auth_username'] = $new;

        return;
    }

    public static function changePassword($old, $new)
    {
        $d = self::getAuth();

        ## Validate password // Your password should contain at least 7 characters with one uppercase letter and one numeric character.
        if(!preg_match('/^(?=.*[A-Z])(?=.*[0-9])[A-Za-z0-9!-\/:-@[-`{-~]{7,25}$/', $new)) {
            $message = 'Password format is invalid';
            return $message;
        }

        ## Validate check that old password and new password are different
        if($old == $new) {
            $message = 'New password cannot be the same as old password';
            return $message;
        }

        try {
    
            $d->changePassword($old, $new);
            $message = 'Password has been changed';
        }
        catch (\Delight\Auth\NotLoggedInException $e) {
            $message = 'Not logged in';
            $errors = true;
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            $message = 'Invalid password(s) provided / Old password incorrect';
            $errors = true;
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            $message = 'Too many requests';
            $errors = true;
        }

        if($errors) {
            return $message;
        }
    }

    /** Required for Delight **/
    public static function prepare_authentication()
    {
        /* MANUAL SESSION FOR DEBUGGING - ASSUMES AUTHORISATION TOKEN (PHPSESSID) IS SEND BY CLIENT */
        // if($_SERVER['HTTP_AUTHORIZATION']) {
        //     session_id($_SERVER['HTTP_AUTHORIZATION']);
        //     session_start();
        // }

        $auth = new \Delight\Auth\Auth(Database::getPdo());
        
        return $auth;
    }

    /* Untested for AJAX */
    public static function registerWithoutEmailVerification($fields)
    {
        $d = self::getAuth();

        $errors = false;

        ## Validate username // Between 5 to 15 alphanumeric chars
        if(!preg_match('/^[A-Za-z0-9]{5,15}$/', $fields['username'])) {
            $message = 'Invalid username';
            return $message;
        }

        ## Validate password // Your password should contain at least 7 characters with one uppercase letter and one numeric character.
        if(!preg_match('/^(?=.*[A-Z])(?=.*[0-9])[A-Za-z0-9!-\/:-@[-`{-~]{7,25}$/', $fields['password'])) {
            $message = 'Password format invalid';
            return $message;
        }

        try {
            $userId = $d->registerWithUniqueUsername($fields['email'], $fields['password'], $fields['username']);
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            
            $message = 'Invalid email address';
            $errors = true;
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            $message = 'Invalid password';
            $errors = true;
        }
        catch (\Delight\Auth\DuplicateUsernameException $e) {
        
            $message = 'The username already exists. Please choose another username!';
            $errors = true;
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {

            $message = 'User already exists!';
            $errors = true;
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {

            $message = 'Too many requests';
            $errors = true;
        }

        if($errors) {
            return $message;
        }

        // Pushover::send("A new user registered on v3@ika");
        
        ## Auto login
        $d->login($fields['email'], $fields['password']);
    }

    /* Login the Delight $this->auth instance */
    public static function attemptLogin($fields)
    {
        $auth = self::getAuth();

        if(!isset($fields['remember'])) {
            $fields['remember'] = "0";
        }

        try {

            if($fields['remember'] == "1") {

                // keep logged in for one year
                $rememberDuration = (int) (60 * 60 * 24 * 365.25);

            } else {

                $rememberDuration = null;
            }

            $r = $auth->login($fields['email'], $fields['password'], $rememberDuration);

            return ['status' => 'success'];
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
        
            $message = 'Invalid email';
            return ['status' => 'error', 'message' => $message];
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
        
            $message = 'Invalid password';
            return ['status' => 'error', 'message' => $message];
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
        
            $message = 'Email not verified';
            return ['status' => 'error', 'message' => $message];
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {    
        
            $message = 'Too many request!';
            return ['status' => 'error', 'message' => $message];
            
        }
    }

    /* Takes in the Mailgun class instance */
    public static function forgotPassword($email)
    {

        $d = self::getAuth();
        
        try {
            
            $d->forgotPassword($email, function ($selector, $token) use ($email) {

                ### User generated Url
                $url = DOMAIN . '/password/reset?selector=' . urlencode($selector) . '&token=' . urlencode($token);
                
                ## Send Mail
                $html_body = "
                <h1>Your Password Reset Link for Cushiejobs: Jobseeker</h1>
                <p>
                <a href='{$url}'>
                    Proceed to reset password
                </a>
                </p>
                <p>This message is automatically generated. Please do not reply to this message.</p>
                ";

                $text_content = "
                Your password reset link.
                Url: $url
                ";

                Mail::send($email, 'Cushiejobs Jobseeker Password Reset', $html_body, $text_content);
            });

            $message = 'An email has been sent to reset your password'; // Request generated
            return ['status' => 'success', 'message' => $message];
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            $message = 'Invalid email address / Email does not exist';
            return ['status' => 'error', 'message' => $message];
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            $message = 'Email not verified';
            return ['status' => 'error', 'message' => $message];
        }
        catch (\Delight\Auth\ResetDisabledException $e) {
            $message = 'Password reset is disabled';
            return ['status' => 'error', 'message' => $message];
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            $message = 'Too many requests';
            return ['status' => 'error', 'message' => $message];
        }
    }

    /*
    Accepts selector, reset token and new password
    */
    public static function resetPassword($selector, $token, $password)
    {

        $d = self::getAuth();

        ## Validate password // Your password should contain at least 7 characters with one uppercase letter and one numeric character.
        if(!preg_match('/^(?=.*[A-Z])(?=.*[0-9])[A-Za-z0-9!-\/:-@[-`{-~]{7,25}$/', $password)) {
            $message = 'Password format is invalid';
            return $message;
        }

        try {
            $d->resetPassword($selector, $token, $password);
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            $message = 'Invalid token';
            $errors = true;
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            $message = 'Token expired';
            $errors = true;
        }
        catch (\Delight\Auth\ResetDisabledException $e) {
            $message = 'Password reset is disabled';
            $errors = true;
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            $message = 'Invalid password';
            $errors = true;
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            $message = 'Too many requests';
            $errors = true;
        }

        if($errors) {
            return $message;
        }
    }

    /*
    Generated by ChatGPT
    - Your password should contain at least 7 characters with one uppercase letter and one numeric character.
    */
    public static function generateRandomPassword()
    {
        $length = 7;
        $uppercase = true;
        $numeric = true;

        $characters = 'abcdefghijklmnopqrstuvwxyz';
        if ($uppercase) {
            $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($numeric) {
            $characters .= '0123456789';
        }

        $password = '';
        $max = strlen($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[mt_rand(0, $max)];
        }

        // Ensure at least one uppercase letter and one numeric character
        if ($uppercase && $numeric) {
            $password[mt_rand(0, $length - 1)] = chr(mt_rand(48, 57)); // Replace a character with a numeric one
            $password[mt_rand(0, $length - 1)] = chr(mt_rand(65, 90)); // Replace a character with an uppercase letter
        } elseif ($uppercase) {
            $password[mt_rand(0, $length - 1)] = chr(mt_rand(65, 90)); // Replace a character with an uppercase letter
        } elseif ($numeric) {
            $password[mt_rand(0, $length - 1)] = chr(mt_rand(48, 57)); // Replace a character with a numeric one
        }

        return $password;
    }

    /*
    Generated by ChatGPT
    user followed by a random 5 digit number, E.g user31421
    */
    public static function generateUsername() {

        $prefix = 'user';
        $randomNumber = rand(10000, 99999);
    
        $username = $prefix . $randomNumber;
    
        return $username;
    }
}

?>