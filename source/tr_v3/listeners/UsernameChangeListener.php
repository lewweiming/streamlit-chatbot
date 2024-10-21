<?php

class UsernameChangeListener
{
    /*
    - [x] Profile table is updated with new username if found
    - [x] Listings table reflects new username
    */
    public static function run($old_username, $new_username)
    {
        # - [x] Profile table is updated with new username if found
        $u = UserProfile::findByUsername($old_username);

        if($u) {
            UserProfile::updateUsername($old_username, $new_username);
        }

        # - [x] Listings table reflects new username
        // Listing::updateAll('username', $new_username);
    }
}
