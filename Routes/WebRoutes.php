<?php

require_once '../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Middlewares\AuthMiddleware;
use App\Controllers\ComicsController;
use App\Controllers\AuthController;
use App\Controllers\AdminController;
use App\Controllers\ChaptersController;
use App\Controllers\GenresController;

$router->get('/test', function() {
    return view('comics/details', [], 'main');
});

$router->GET(
    "/",
    HomeController::index(...)
);

$router->mount('/(\d+)', function () use ($router) {
    $router->GET('/', ComicsController::details(...));
    $router->GET('/(\d+)', ComicsController::chapter(...));
});

$router->before('GET', '/admin.*', AuthMiddleware::handler(...));

$router->mount('/admin', function () use ($router) {
    $router->GET(
        '/',
        AdminController::index(...)
    );
    $router->mount(
        "/login",
        function () use ($router) {
            $router->GET(
                '/',
                AuthController::loginView(...)
            );
            $router->POST(
                "/",
                AuthController::login(...)
            );
        }
    );
    $router->GET(
        "/logout",
        AuthController::logout(...)
    );
    $router->mount('/comics', function () use ($router) {

        $router->GET(
            "/",
            ComicsController::adminIndex(...)
        );
        $router->mount("/(\d+)", function () use ($router) {

            $router->GET(
                "/",
                ComicsController::getOne(...)
            );
            $router->mount("/edit", function () use ($router) {
                $router->GET(
                    "/",
                    ComicsController::updateView(...)
                );
                $router->PATCH(
                    "/",
                    ComicsController::update(...)
                );
            });
            $router->mount("/chapters", function () use ($router) {
                $router->GET(
                    "/",
                    ChaptersController::adminIndex(...)
                );
                $router->mount('/create', function () use ($router) {
                    $router->GET(
                        "/",
                        ChaptersController::createView(...)
                    );
                    $router->POST(
                        "/",
                        ChaptersController::create(...)
                    );
                });
                $router->mount("/(\d+)", function () use ($router) {

                    $router->GET(
                        "/",
                        ChaptersController::getOne(...)
                    );
                    $router->mount("/edit", function () use ($router) {
                        $router->GET(
                            "/",
                            ChaptersController::updateView(...)
                        );
                        $router->PATCH(
                            "/",
                            ChaptersController::update(...)
                        );
                    });
                    $router->DELETE(
                        "/delete",
                        ChaptersController::delete(...)
                    );
                });
            });
            $router->DELETE(
                "/delete",
                ComicsController::delete(...)
            );
        });
        $router->mount('/create', function () use ($router) {
            $router->GET(
                "/",
                ComicsController::createView(...)
            );
            $router->POST(
                "/",
                ComicsController::create(...)
            );
        });
    });
    $router->mount('/genres', function () use ($router) {
        $router->GET(
            "/",
            GenresController::adminIndex(...)
        );
        $router->mount("/(\d+)", function () use ($router) {
            $router->GET(
                "/",
                GenresController::getOne(...)
            );
            $router->mount("/edit", function () use ($router) {
                $router->GET(
                    "/",
                    GenresController::updateView(...)
                );
                $router->PATCH(
                    "/",
                    GenresController::update(...)
                );
            });
            $router->DELETE(
                "/delete",
                GenresController::delete(...)
            );

        });
        $router->mount('/create', function () use ($router) {
            $router->GET(
                "/",
                GenresController::createView(...)
            );
            $router->POST(
                "/",
                GenresController::create(...)
            );
        });
    });
});