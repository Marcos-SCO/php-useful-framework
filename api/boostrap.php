<?php

use App\Config\Conn;
use App\Config\MySql;
use CoffeeCode\Router\Router;

$baseDir = dirname(getcwd());

require_once "../vendor/autoload.php";
require_once "../app/helpers/functions.php";

// Env variables will be in $_ENV array
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1), '.env');
$dotenv->load();
// var_dump($_ENV);

// Timezone
date_default_timezone_set($_ENV["DEFAULT_TIME_ZONE"]);

// Connection 
$conn = new Conn(new MySql);

// Model instantiation and connection set
$model = new App\Models\Model($conn);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$router = new Router($_ENV["BASE"]);

// Router namespace
$router->namespace("App\Controller");

// Auth
$router->post("/login", "Auth:login");

// Usuários
$router->get("/usuarios", "Users:index");
$router->get("/usuarios/{id}", "Users:getUser");
$router->post("/usuarios", "Users:createUser");
$router->delete("/usuarios", "Users:deleteUser");
$router->put("/usuarios", "Users:updateUser");

$router->dispatch();

if ($router->error()) {
    echo $router->error();
}
