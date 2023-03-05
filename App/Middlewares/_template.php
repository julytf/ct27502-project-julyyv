<?php

namespace App\Middlewares;

class Auth
{
    static function handler()
    {
        if (
            !isset($_SESSION) &&
            !isset($_SESSION["token"])
        ) {
            return FALSE;
        }

        return TRUE;
    }
}
