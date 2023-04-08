<?php

namespace Index;

require_once '../vendor/autoload.php';

require_once '../Helpers/helpers.php'; 

use App\Controllers\AssetsController;
use Dotenv\Dotenv;
use Bramus\Router\Router;
use App\Controllers\UsersController;

// test

// echo $_SERVER['REQUEST_METHOD'];
// echo $_SERVER['REQUEST_URI'];
// print_r($webRoutes);

// test

$dotenv = Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();


if($_SERVER['REQUEST_METHOD'] === "POST") {
    // echo $_POST["_method"];
    $_SERVER['REQUEST_METHOD'] = $_POST["_method"] ?? $_SERVER['REQUEST_METHOD'];
}

require_once("../DB/connection.php");

$router = new Router();
$router->setBasePath('/');
$router->setNamespace('/App/Controllers');

// serve static
$router->get("/(img|css|js|font)(/.*)?", AssetsController::get(...));

// web routes
require_once('../routes/WebRoutes.php');

// api routes
require_once('../routes/apiRoutes.php');

// 404
$router->set404(function () {
// TODO:
    // header('HTTP/1.1 404 Not Found');
    echo "404 roi huhu";
});

$router->run();