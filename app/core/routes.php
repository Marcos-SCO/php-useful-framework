<?php

use App\Controller\Home;
use App\Controller\Users;
use CoffeeCode\Router\Router;

/* Documentation: */
// https://packagist.org/packages/coffeecode/router

$router = new Router($_ENV["BASE"]);

// Router namespace
$router->namespace("App\Controller");

// Model instantiation and connection set
$model = new App\Models\Model($conn);

// Home
$router->get("/", "Home:index");
$router->get("/home/usuario/{id}", "Home:getUser");

// Usuários
$router->get("/usuarios/{id}", "Users:getUser");

$router->dispatch();

if ($router->error()) {
    echo $router->error();
    // $router->redirect("/error/{$router->error()}");
}
