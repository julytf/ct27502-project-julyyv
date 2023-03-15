<?php

namespace Routes;

use App\Middlewares\AuthMiddleware;
use App\Controllers\ComicsController;
use App\Controllers\AuthController;
use App\Controllers\AdminController;

require_once '../vendor/autoload.php';

$webRoutes = [
    "/test" => [
        "GET" => [
            "middlewares" => [],
            "controller" => function () {
                echo auth()->is_logged_in() ? "true" : "false";
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
                AuthMiddleware::class,
            ],
            "controller" => AdminController::index(...),
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
    "/admin/comics" => [
        "GET" => [
            "middlewares" => [
                AuthMiddleware::class,
            ],
            "controller" => ComicsController::index(...),
        ]
    ],
    "/admin/comics" => [
        "POST" => [
            "middlewares" => [
                AuthMiddleware::class,
            ],
            "controller" => ComicsController::create(...),
        ],
    ],
    "/admin/comics/create" => [
        "POST" => [
            "middlewares" => [
                AuthMiddleware::class,
            ],
            "controller" => ComicsController::createView(...),
        ],
    ],
    "/admin/comics/{comic_id}" => [
        "GET" => [
            "middlewares" => [
                AuthMiddleware::class,
            ],
            "controller" => ComicsController::getOne(...),
        ],
        "PATCH" => [
            "middlewares" => [
                AuthMiddleware::class,
            ],
            "controller" => ComicsController::update(...),
        ],
        "DELELTE" => [
            "middlewares" => [
                AuthMiddleware::class,
            ],
            "controller" => ComicsController::delete(...),
        ],
    ],
    "/admin/comics/{comic_id}/edit" => [
        "GET" => [
            "middlewares" => [
                AuthMiddleware::class,
            ],
            "controller" => ComicsController::updateView(...),
        ],
    ],
    "/comics" => [
        "GET" => [
            "middlewares" => [],
            "controller" => function () { },
        ],
        "POST" => [
            "middlewares" => [],
            "controller" => function () { },
        ],
        // "PATCH" => [
        //     "middlewares" => [],
        //     "controller" => function() {},
        // ],
        "DELETE" => [
            "middlewares" => [],
            "controller" => function () { },
        ],
    ],
    "/{comic_id}" => [
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
];