<?php

namespace Routes;

use App\Middlewares\Auth;
use App\Controllers\UsersController;

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
    ]
];