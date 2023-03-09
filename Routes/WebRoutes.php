<?php

namespace Routes;

use Helpers\Auth;
use App\Controllers\ComicsController;
use App\Controllers\AuthController;

require_once '../vendor/autoload.php';

$webRoutes = [
    "/test" => [
        "GET" => [
            "middlewares" => [],
            "controller" => function () {
                echo Auth::is_login() ? "true" : "false";
            },
        ],
    ],
    "/" => [
        "GET" => [
            "middlewares" => [],
            "controller" => function () {
                echo "welcome!";
            },
        ],
    ],
    "/admin" => [
        "GET" => [
            "middlewares" => [
                Auth::is_login()
            ],
            "controller" => function () {
                echo "welcome admin!";
            },
        ]
    ],
    "/admin/login" => [
        "GET" => [
            "middlewares" => [],
            "controller" => AuthController::loginView(...),
        ],
        "POST" => [
            "middlewares" => [],
            "controller" => AuthController::login(...),
        ],
    ],
    "/admin/logout" => [
        "GET" => [
            "middlewares" => [],
            "controller" => AuthController::logout(...),
        ],
    ],
];