<?php

class Auth
{
    static $instance;
    function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    static function get_instance()
    {
        if (!static::$instance) {
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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['flash_message'] ??= [];
    }
    static function get_instance()
    {
        if (!static::$instance) {
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
        $messages = $_SESSION['flash_message'][$type] ?? [];
        static::clear();
        return $messages;
    }
    static function clear($type = "success")
    {
        unset($_SESSION['flash_message'][$type]);
    }
}

function flash_message()
{
    return FlashMessage::get_instance();
}

function view($view, $data = [], $layout = null)
{
    $view_path = null;
    if (is_file('../views/' . $view . '.php')) {
        $view_path = '../views/' . $view . '.php';
    } else if (is_file('../views/' . $view . '/index.php')) {
        $view_path = '../views/' . $view . '/index.php';
    }
    if (isset($view_path)) {
        extract($data);
        $layout_path = null;
        if (isset($layout)) {
            if (is_file('../views/layouts/' . $layout . '.php')) {
                $layout_path = '../views/layouts/' . $layout . '.php';
            } else if (is_file('../views/layouts/' . $layout . '/index.php')) {
                $layout_path = '../views/layouts/' . $layout . '/index.php';
            }
        }
        if (isset($layout_path)) {
            $body = $view_path;
            require_once($layout_path);
        } else {
            require_once($view_path);
        }
        return;
    }
}

function redirect($location)
{
    header('Location: ' . $location);
    exit();
}