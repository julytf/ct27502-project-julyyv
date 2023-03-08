<?php

namespace Helpers;

class Auth{
    static function init() {
        session_start();
    }
    static function login($id) {
        static::init();
        $_SESSION['user'] = $id;
    }
    static function logout() {
        static::init();
        unset($_SESSION['user']);
    }
    static function is_login() {
        static::init();
        return isset($_SESSION['user']);
    }
}
