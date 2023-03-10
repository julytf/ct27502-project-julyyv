<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

use App\Models\User;

class templateController
{
    public static function index()
    {
        $data = [ "test" => 12345];
        return Helpers::view(
            "users",    // view name
            [   // data 
                "test" => $data
            ],
            "users" //layout
        );
    }
}
