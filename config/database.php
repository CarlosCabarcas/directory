<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$connection = new Capsule;

$connection->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'directory',
    'username'  => 'root',
    'password'  => 'Carlos@123',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
]);

$connection->bootEloquent();