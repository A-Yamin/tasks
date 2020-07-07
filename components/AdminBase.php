<?php

/**
 * Abstract class AdminBase for Admin panel
 */
abstract class AdminBase
{
    /**
     * if Admin returns true
     * @return boolean
     */
    public static function checkAdmin()
    {
        // if not logged redirect
        $userId = User::checkLogged();

        // get user data
        $user = User::getUserById($userId);

        // if Admin returns true
        if ($user['role'] == 'admin') {
            return true;
        }

        // if NOT Admin:
        die('Access denied');
    }
}
