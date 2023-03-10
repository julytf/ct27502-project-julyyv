<?php

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

class FlashMessage{
    private static function init() {
        session_start();
        $_SESSION['flash_message'] ??= [];
    }
    static function create($message, $type = "success") {
        static::init();
        $_SESSION['flash_message'][$type][] = $message;
    }
    static function get($type = "success") {
        static::init();
        return $_SESSION['flash_message'][$type] || [];
    }
    static function clear($type = "success") {
        unset($_SESSION['flash_message'][$type]);
    }
}

function view($view, $data = [], $layout = null)
{
    if (is_file('../views/' . $view . '.php')) {
        extract($data);
        if (isset($layout) && is_file('../views/layouts/' . $layout . '.php')) {
            $body = "../views/" . $view . '.php';
            require_once('../views/layouts/' . $layout . '.php');
        } else {
            require_once('../views/' . $view . '.php');
        }
    }
}

function redirect($location) {
    header('Location: '. $location);
    exit();
}