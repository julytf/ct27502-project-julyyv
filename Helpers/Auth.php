<?php

namespace Helpers;

class Auth
{
    static function init()
    {
        session_start();
    }
    static function login()
    {
        static::init();
        $_SESSION['is_logged_in'] = TRUE;
    }
    static function logout()
    {
        static::init();
        unset($_SESSION['is_logged_in']);
    }
    static function is_logged_in()
    {
        static::init();
        return isset($_SESSION['is_logged_in']);
    }
}