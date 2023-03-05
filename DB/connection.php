<?php

namespace DB;

use PDO;
use PDOException;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV["DATABASE_HOST"],
    'database' => $_ENV["DATABASE_NAME"],
    'username' => $_ENV["DATABASE_USERNAME"],
    'password' => $_ENV["DATABASE_PASSWORD"],
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();