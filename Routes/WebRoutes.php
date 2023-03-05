<?php

namespace Routes;

use App\Middlewares\Auth;
use App\Controllers\UsersController;
use App\Controllers\BooksController;

require_once '../vendor/autoload.php';

$webRoutes = [
    "/" => [
        "GET" => [
            "middlewares" => [
                Auth::handler(...),
            ],
            "controller" => function () {
                echo "welcome!";
            },
        ],
    ],
    "/users" => [
        "GET" => [
            "controller" => UsersController::index(...),
        ],
    ],
    "/books/{bookId}" => [
        "GET" => [
            "controller" => BooksController::getOne(...),
        ],
    ]
];