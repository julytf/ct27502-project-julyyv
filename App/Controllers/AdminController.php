<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

class AdminController
{
    static function index()
    {
        return view("index.admin", [], "main");
    }
}