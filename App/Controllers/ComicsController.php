<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

use App\Models\Comic;

class ComicsController
{
    public static function index()
    {
        $data = Comic::get();
        return view(
            "comics/index",
            [
                "comics" => $data,
            ],
            "main", // layout
        );
    }
    public static function adminIndex()
    {
        $data = Comic::get();
        return view(
            "comics/index",
            [
                "comics" => $data,
            ],
            "main", // layout
        );
    }
    public static function create()
    {
        echo "TODO:";
    }
    public static function createView()
    {
        echo "TODO:";
    }
    public static function updateView()
    {
        echo "TODO:";
    }
    public static function getOne()
    {
        echo "TODO:";
    }
    public static function update()
    {
        echo "TODO:";
    }
    public static function delete()
    {
        echo "TODO:";
    }
}