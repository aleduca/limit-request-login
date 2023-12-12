<?php

use app\controllers\LoginController;

$routes = [
  ['/login', LoginController::class, 'index', 'GET'],
  ['/login', LoginController::class, 'store', 'POST']
];

$currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = $_SERVER['REQUEST_METHOD'];

foreach ($routes as $route) {
  if ($route[0] === $currentUri && $route[3] === $request) {
    $controller = $container->get($route[1]);
    $action = $route[2];
    $controller->$action();
    break;
  }
}
