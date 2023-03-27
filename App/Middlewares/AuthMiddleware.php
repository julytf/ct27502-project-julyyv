<?php

namespace App\Middlewares;

class AuthMiddleware
{
    static function handler()
    {
        if (str_starts_with($_SERVER['REQUEST_URI'], '/admin/login')) {
            return;
        }

        if (
            !auth()->is_logged_in()
        ) {
            redirect('/admin/login');
            exit;
        }
    }
}