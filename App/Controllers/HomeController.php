<?php

namespace App\Controllers;

use App\Models\Comic;
use Illuminate\Pagination\Paginator;

require_once '../vendor/autoload.php';

class HomeController
{
    public static function index()
    {   
        parse_str($_SERVER['QUERY_STRING'], $query);

        $page = $query['page'] ?? 1;
        if($page < 1) $page = 1;

        $perPage = $query['perPage'] ?? 6;

        $skip = ($page - 1) * $perPage;

        $comics = Comic::skip($skip)->take($perPage)->get();

        $count  = Comic::count();
        $noPage = ceil($count / $perPage);
        
        return view(
            'home',
            [
                'comics' => $comics,
                'page' => $page,
                'noPage' => $noPage,
                'perPage' => $perPage,
            ],
            'main'
        );
    }
}