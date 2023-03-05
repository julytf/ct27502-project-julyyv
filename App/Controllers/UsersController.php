<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

use Helpers\Helpers;

use App\Models\User;

class UsersController
{
    public static function index()
    {

        $user = new User;
        $user->username = "username123";
        $user->save();

        $users = User::get();
        // print_r($users);
        return Helpers::view(
            "users",    
            [ 
                "users" => $users
            ],
            "main", // layout
        );
    }
}