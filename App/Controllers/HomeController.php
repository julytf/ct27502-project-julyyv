<?php

namespace App\Controllers;

use App\Models\Comic;
use Illuminate\Pagination\Paginator;

require_once '../vendor/autoload.php';

class HomeController
{
    public static function index()
    {   
        $perPage = $_GET['perPage'] ?? 24;
        $q = $_GET['q'] ?? '';

        $query = Comic::where('name', 'like', '%' . $q . '%')->orderBy('id', 'desc');

        $count  = $query->count();
        $no_page = ceil($count / $perPage);

        $page = $_GET['page'] ?? 1;
        if($page < 1) $page = 1;
        if($page > $no_page) $page = $no_page;

        $skip = ($page - 1) * $perPage;

        $comics = $query->skip($skip)->take($perPage)->get();

        
        return view(
            'home',
            [
                'comics' => $comics,
                'page' => $page,
                'no_page' => $no_page,
                'perPage' => $perPage,
                'q' => $q,
            ],
            'main'
        );
    }
}