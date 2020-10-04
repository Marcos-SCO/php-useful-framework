<?php

use App\Controller\Home;
use CoffeeCode\Router\Router;

/* Documentation: */
// https://packagist.org/packages/coffeecode/router

$router = new Router($_ENV["BASE"]);

// Router namespace
$router->namespace("App\Controller");

// Model instantiation and connection set
$model = new App\Models\Model($conn);

// Home
$home = new Home;
$router->get("/", function () {
    global $home;
    $home->index();
});
$router->get("/usuario/{id}", function ($id) {
    global $home;
    $home->getUser($id);
});

$router->dispatch();

if ($router->error()) {
    echo $router->error();
    // $router->redirect("/error/{$router->error()}");
}
