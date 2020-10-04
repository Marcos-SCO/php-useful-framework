<?php 

require_once "./vendor/autoload.php";
require_once "./app/helpers/functions.php";

use App\Config\Conn;
use App\Config\MySql;

// Env variables will be in $_ENV array
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1), '.env');
$dotenv->load();
// var_dump($_ENV);

// Timezone
date_default_timezone_set($_ENV["DEFAULT_TIME_ZONE"]);

// Connection 
$conn = new Conn(new MySql);

// $c = new Model(new App\Config\MySql());

// $model = new Model($conn);
// $user = new User($conn);
// var_dump($user->select('users'));

require_once "./app/core/routes.php";