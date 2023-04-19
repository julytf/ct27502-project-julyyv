<?php

require_once '../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Middlewares\AuthMiddleware;
use App\Controllers\ComicsController;
use App\Controllers\AuthController;
use App\Controllers\AdminController;
use App\Controllers\ChaptersController;
use App\Controllers\GenresController;
use App\Models\Genre;

$router->get('/test', function () {
    $genre = Genre::find(1);
    echo json_encode($genre);
    // echo json_encode($genre->comics()->get());
    $genre->comics()->detach();
});

$router->GET(
    "/",
    HomeController::index(...)
);

$router->mount('/(\d+)', function () use ($router) {
    $router->GET('/', ComicsController::detail(...));
    $router->GET('/(\d+)', ChaptersController::detail(...));
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
            $router->DELETE(
                "/delete",
                ComicsController::delete(...)
            );
            $router->mount("/chapters", function () use ($router) {
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
