<?php declare(strict_types=1);

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/directory', 'DirectoryController/index');
});