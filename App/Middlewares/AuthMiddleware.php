<?php

namespace App\Middlewares;

class AuthMiddleware
{
    static function handler()
    {
        if (
            !auth()->is_logged_in()
        ) {
            header('Location: /admin/login');
            exit;
        }
    }
}