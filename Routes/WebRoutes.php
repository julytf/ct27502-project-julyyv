<?php

namespace Routes;

use Helpers\Auth;
use App\Controllers\UsersController;
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
    "/login" => [
        "GET" => [
            "middlewares" => [],
            "controller" => AuthController::loginView(...),
        ],
        "POST" => [
            "middlewares" => [],
            "controller" => AuthController::login(...),
        ],
    ],
    "/logout" => [
        "GET" => [
            "middlewares" => [],
            "controller" => AuthController::logout(...),
        ],
    ],
    "/users" => [
        "GET" => [
            "middlewares" => [],
            "controller" => UsersController::index(...),
        ],
    ],
];