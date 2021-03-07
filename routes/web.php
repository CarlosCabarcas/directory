<?php declare(strict_types=1);

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/directory', 'DirectoryController/index');
    $r->addRoute('GET', '/filter', 'DirectoryController/filter');
    $r->addRoute('GET', '/register', 'UserController/registerForm');
    $r->addRoute('POST', '/register', 'UserController/register');
    $r->addRoute('GET', '/login', 'AuthController/loginForm');
    $r->addRoute('GET', '/', 'AuthController/loginForm');
    $r->addRoute('POST', '/login', 'AuthController/login');
    $r->addRoute('GET', '/logout', 'AuthController/logout');
});