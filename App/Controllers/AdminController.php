<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

class AdminController
{
    static function adminView()
    {
        return view("admin");
    }
}