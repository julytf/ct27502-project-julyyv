<?php

namespace App\Middlewares;

use Helpers\Auth;

class AuthMiddleware
{
    static function handler()
    {
        if (
            !Auth::is_logged_in()
        ) {
            header('Location: /admin/login');
            exit;
        }
    }
}