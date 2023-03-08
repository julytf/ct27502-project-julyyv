<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

use Helpers\Auth;
use Helpers\FlashMessage;
use Helpers\Helpers;

use App\Models\User;
use Redirect;

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
        $user = User::where("username", $username)->first();

        if(!$user || $password !== $user->password) {
            FlashMessage::create("Tài khoản hoặc mật khẩu không hợp lệ!", "error");
            return header('Location: /login');
        }

        Auth::login($user->id);
        return header('Location: /');
    }
    static function logout()
    {
        Auth::logout();
        return header('Location: /');
    }
}