<?php

namespace Routes;

use App\Middlewares\AuthMiddleware;
use App\Controllers\ComicsController;
use App\Controllers\AuthController;
use App\Controllers\AdminController;

require_once '../vendor/autoload.php';

$webRoutes = [
    // "/test" => [
    //     "GET" => [
    //         "middlewares" => [],
    //         "controller" => function () {
    //             echo auth()->is_logged_in() ? "true" : "false";
    //         },
    //     ],
    // ],
    "/" => [
        "GET" => [
            "middlewares" => [],
            "controller" => ComicsController::index(...),
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
            "controller" => ComicsController::adminIndex(...),
        ],
    ],
    "/admin/comics/create" => [
        "GET" => [
            "middlewares" => [
                AuthMiddleware::class,
            ],
            "controller" => ComicsController::createView(...),
        ],
        "POST" => [
            "middlewares" => [
                AuthMiddleware::class,
            ],
            "controller" => ComicsController::create(...),
        ],
    ],
    "/admin/comics/{comic_id}" => [
        "GET" => [
            "middlewares" => [
                AuthMiddleware::class,
            ],
            "controller" => ComicsController::getOne(...),
        ],
    ],
    "/admin/comics/{comic_id}/edit" => [
        "GET" => [
            "middlewares" => [
                AuthMiddleware::class,
            ],
            "controller" => ComicsController::updateView(...),
        ],
        "PATCH" => [
            "middlewares" => [
                AuthMiddleware::class,
            ],
            "controller" => ComicsController::update(...),
        ],
    ],
    "/admin/comics/{comic_id}/delete" => [
        "DELETE" => [
            "middlewares" => [
                AuthMiddleware::class,
            ],
            "controller" => ComicsController::delete(...),
        ],
    ],
    // "/comics" => [
        // "GET" => [
        //     "middlewares" => [],
        //     "controller" => function () { 
        //         echo "TODO:";
        //     },
        // ],
        // "POST" => [
        //     "middlewares" => [],
        //     "controller" => function () { 
        //         echo "TODO:";
        //     },
        // ],
        // "PATCH" => [
        //     "middlewares" => [],
        //     "controller" => function() {},
        // ],
        // "DELETE" => [
        //     "middlewares" => [],
        //     "controller" => function () { 
        //         echo "TODO:";
        //     },
        // ],
    // ],
    "/{comic_id}" => [
        "GET" => [
            "middlewares" => [],
            "controller" => function () {
                echo "TODO: comic info!";
            },
        ],
    ],
    "/{comic_slug}/{chap_id}" => [
        "GET" => [
            "middlewares" => [],
            "controller" => function () {
                echo "TODO: comic chap";
            },
        ],
    ],
];