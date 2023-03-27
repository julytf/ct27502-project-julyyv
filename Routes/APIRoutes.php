<?php

require_once '../vendor/autoload.php';

$router->GET('/api', function () use ($router) {
    echo "welcome to API!";
});