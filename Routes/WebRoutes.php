<?php

namespace Routes;

use App\Middlewares\AuthMiddleware;
use Helpers\Auth;
use App\Controllers\ComicsController;
use App\Controllers\AuthController;

require_once '../vendor/autoload.php';

$webRoutes = [
    "/test" => [
        "GET" => [
            "middlewares" => [],
            "controller" => function () {
                echo Auth::is_logged_in() ? "true" : "false";
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
    "/{comic_slug}" => [
        "GET" => [
            "middlewares" => [],
            "controller" => function () {
                echo "comic info!";
            },
        ],
    ],
    "/{comic_slug}/{chap_id}" => [
        "GET" => [
            "middlewares" => [],
            "controller" => function () {
                echo "comic chap";
            },
        ],
    ],
    "/admin" => [
        "GET" => [
            "middlewares" => [
                AuthMiddleware::class,
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
    "/comics" => [
        "GET" => [
            "middlewares" => [],
            "controller" => function() {},
        ],
        "POST" => [
            "middlewares" => [],
            "controller" => function() {},
        ],
        // "PATCH" => [
        //     "middlewares" => [],
        //     "controller" => function() {},
        // ],
        "DELETE" => [
            "middlewares" => [],
            "controller" => function() {},
        ],
    ]
];