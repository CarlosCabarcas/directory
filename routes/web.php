<?php declare(strict_types=1);

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/directory', 'DirectoryController/index');
    $r->addRoute('GET', '/register', 'UserController/registerForm');
    $r->addRoute('POST', '/register', 'UserController/register');
    $r->addRoute('GET', '/login', 'UserController/loginForm');
    $r->addRoute('POST', '/login', 'UserController/login');
    $r->addRoute('GET', '/logout', 'UserController/logout');
});