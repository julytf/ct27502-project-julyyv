<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

use Helpers\Helpers;

// use App\Models\User;

class BookController
{
    public static function index()
    {
    }

    public static function getOne($bookId) {
        $book = Book::where('id', '=', $bookId)->get();
        
    }

}