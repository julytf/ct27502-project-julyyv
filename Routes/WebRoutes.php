<?php

require_once '../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Middlewares\AuthMiddleware;
use App\Controllers\ComicsController;
use App\Controllers\AuthController;
use App\Controllers\AdminController;

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