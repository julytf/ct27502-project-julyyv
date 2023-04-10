<?php

require_once '../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Middlewares\AuthMiddleware;
use App\Controllers\ComicsController;
use App\Controllers\AuthController;
use App\Controllers\AdminController;
use App\Controllers\ChaptersController;

$router->get('/test', function() {
    return view('comics/details', [], 'main');
});

$router->GET(
    "/",
    HomeController::index(...)
);

$router->mount('/(\d+)', function () use ($router) {
    $router->GET('/', ComicsController::details(...));
    $router->GET('/(\d+)', function ($chap_id) {
        echo "TODO: chap info!";
        echo $chap_id;
    });
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
                // $router->PATCH(
                //     "/",
                //     ComicsController::update(...)
                // );
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
});