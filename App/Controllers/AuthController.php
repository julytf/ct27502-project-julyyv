<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

class AuthController
{
    static function loginView()
    {
        return view("login.auth");
    }
    static function login()
    {
        $username = $_POST["username"] ?? null;
        $password = $_POST["password"] ?? null;

        if( $username !== $_ENV["ADMIN_USERNAME"] || $password !== $_ENV["ADMIN_PASSWORD"] ) {
            flash_message()->create("Tài khoản hoặc mật khẩu không hợp lệ!", "error");
            return header('Location: /admin/login');
        }else{
            flash_message()->create("Đăng nhập ADMIN thành công!", "success");
        }

        auth()->login();
        return header('Location: /admin');
    }
    static function logout()
    {
        auth()->logout();
        return header('Location: /admin/login');
    }
}