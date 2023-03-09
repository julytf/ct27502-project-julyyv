<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

use Helpers\Auth;
use Helpers\FlashMessage;
use Helpers\Helpers;

class AuthController
{
    static function loginView()
    {
        return Helpers::view("login");
    }
    static function login()
    {
        $username = $_POST["username"] ?? null;
        $password = $_POST["password"] ?? null;

        if( $username !== $_ENV["ADMIN_USERNAME"] || $password !== $_ENV["ADMIN_PASSWORD"] ) {
            FlashMessage::create("Tài khoản hoặc mật khẩu không hợp lệ!", "error");
            return header('Location: /admin/login');
        }

        Auth::login();
        return header('Location: /admin');
    }
    static function logout()
    {
        Auth::logout();
        return header('Location: /admin/login');
    }
}