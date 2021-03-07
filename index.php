<?php

require 'vendor/autoload.php';
require 'config/database.php';
include 'routes/web.php';


// $users = App\Entities\User::get();

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // echo "here";
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = explode('/', $routeInfo[1]);
        $vars = !empty($routeInfo[2]) ? $routeInfo[2] : null;
        call_user_func(['\App\Controllers\\' . $handler[0], $handler[1]], $vars);
        break;
}