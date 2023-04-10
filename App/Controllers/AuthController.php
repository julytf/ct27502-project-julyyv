<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

class AuthController
{
    static function loginView()
    {
        return view("auth/login", [], 'admin');
    }
    static function login()
    {
        $username = $_POST["username"] ?? null;
        $password = $_POST["password"] ?? null;

        if( $username !== $_ENV["ADMIN_USERNAME"] || $password !== $_ENV["ADMIN_PASSWORD"] ) {
            flash_message()->create("Tài khoản hoặc mật khẩu không hợp lệ!", "error");
            return redirect('/admin/login');
        }else{
            flash_message()->create("Đăng nhập ADMIN thành công!", "success");
        }

        auth()->login();
        return redirect('/admin');
    }
    static function logout()
    {
        auth()->logout();
        return redirect('/admin/login');
    }
}