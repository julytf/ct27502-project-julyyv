<?php

namespace Index;

require_once '../vendor/autoload.php';

// require_once '../Helpers/helpers.php'; // da require bang autoload

use Dotenv\Dotenv;
use Bramus\Router\Router;
use App\Controllers\UsersController;

require_once("../Routes/WebRoutes.php");
use Routes\webRoutes;

// test

// echo $_SERVER['REQUEST_METHOD'];
// echo $_SERVER['REQUEST_URI'];
// print_r($webRoutes);

// test

$dotenv = Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

require_once("../DB/connection.php");

$router = new Router();
$router->setBasePath('/');
$router->setNamespace('/App/Controllers');

foreach ($webRoutes as $path => $methods) {
    foreach ($methods as $method => $detail) {
        $middlewares = $detail["middlewares"] ?? [];
        foreach ($middlewares as $middleware) {
            $router->before($method, $path,$middleware::handler(...));
        }

        $controller = $detail["controller"];
        $router->$method($path, $controller);
    }
}

$router->set404(function () {
// TODO:
    // header('HTTP/1.1 404 Not Found');
    echo "404 roi huhu";
});

$router->run();