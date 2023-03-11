<?php

class Auth
{
    static $instance;
    function __construct()
    {
        session_start();
    }
    static function get_instance()
    {
        if(!static::$instance) {
            static::$instance = new Auth;
        }
        return static::$instance;
    }

    static function login()
    {
        $_SESSION['is_logged_in'] = TRUE;
    }
    static function logout()
    {
        unset($_SESSION['is_logged_in']);
    }
    static function is_logged_in()
    {
        return isset($_SESSION['is_logged_in']);
    }
}

function auth()
{
    return Auth::get_instance();
}

class FlashMessage
{
    static $instance;
    function __construct()
    {
        session_start();
        $_SESSION['flash_message'] ??= [];
    }
    static function get_instance()
    {
        if(!static::$instance) {
            static::$instance = new FlashMessage;
        }
        return static::$instance;
    }
    static function create($message, $type = "success")
    {
        $_SESSION['flash_message'][$type][] = $message;
    }
    static function get($type = "success")
    {
        return $_SESSION['flash_message'][$type] ?? [];
    }
    static function clear($type = "success")
    {
        unset($_SESSION['flash_message'][$type]);
    }
}

function flash_message() {
    return FlashMessage::get_instance();
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

function redirect($location)
{
    header('Location: ' . $location);
    exit();
}