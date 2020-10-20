<?php

/* Documentation: */
// https://packagist.org/packages/coffeecode/router

// $router = new Router($_ENV["BASE"]);

// // Router namespace
// $router->namespace("App\Controller");

// // Home
// $router->get("/", "Home:index");
// $router->get("/home/usuario/{id}", "Home:getUser");

// // Usuários
// $router->get("/usuarios/{id}", "Users:getUser");

// $router->dispatch();

// if ($router->error()) {
//     echo $router->error();
//     // $router->redirect("/error/{$router->error()}");
// }

// Custom router routes
$routes[] = ['/', 'Home@index'];
$routes[] = ['/usuario/{id}', 'Home@getUser'];