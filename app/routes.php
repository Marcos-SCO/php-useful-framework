<?php

use App\Controller\Home;
use App\Core\Router;

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

// $router = new Router();

// // $router->on('GET', "/home", function() {
// //     $home = new Home;
// //     $home->index();
// // });
// $router->on("GET", '/', "Home::index");
// $router->on("GET", "/user/{id}", "Home::getUser");

// echo $router->run($router->method(), $router->uri());

$routes[] = ['/', 'Home@index'];
$routes[] = ['/usuario/{id}', 'Home@getUser'];