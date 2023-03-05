<?php

namespace App\Middlewares;

class Auth
{
    static function handler()
    {
        if (
            !(isset($_SESSION["token"]) ?? null)
        ) {
            return FALSE;
        }

        return TRUE;
    }
}
