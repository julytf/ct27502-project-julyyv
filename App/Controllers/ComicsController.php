<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

use Helpers\Helpers;
use App\Models\Comic;

class ComicsController
{
    public static function index()
    {
        $data = Comic::get();
        // die($data);
        // print_r($users);
        // echo "here";
        return Helpers::view(
            "comics",
            [
                "comics" => $data,
            ],
            "main", // layout
        );
    }
    public static function create()
    {
    }
}