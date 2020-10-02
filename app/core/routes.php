<?php

use CoffeeCode\Router\Router;
use App\Controller\Users;

/* Documentation: */
// https://packagist.org/packages/coffeecode/router

$router = new Router($_ENV["BASE"]);

// Router namespace
$router->namespace("App\Controller");

// Model instantiation and connection set
$model = new App\Models\Model($conn);

// User
$users = new Users();
// $user->select('users');

$router->get("/usuarios", function() {
    global $users;
    $users->index();
});
$router->get("/usuarios/{id}", function($params) {
    // Extract variables
    extract($params);
    
    global $users;
    $users->fetch($id);
});

$router->dispatch();

if ($router->error()) {
    echo $router->error();
    // $router->redirect("/error/{$router->error()}");
}
