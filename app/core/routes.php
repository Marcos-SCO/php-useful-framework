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

$uri = parse_url($_GET["route"], PHP_URL_PATH);
$uri = explode('/', $uri);

if ($uri[1] === 'home') {
    // Home
    $home = new Home;
    $router->get("/", function () {
        global $home;
        $home->index();
    });
    $router->get("/home/usuario/{id}", function ($id) {
        global $home;
        $home->getUser($id);
    });
}

if ($uri[1] === 'usuario') {
    $users = new Users;
    $router->get("/usuario/{id}", function ($id) {
        global $users;
        $users->getUser($id);
    });
}

$router->dispatch();

if ($router->error()) {
    echo $router->error();
    // $router->redirect("/error/{$router->error()}");
}
