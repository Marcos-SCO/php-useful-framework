<?php 

require_once "../vendor/autoload.php";

use App\Config\Connection;
use App\Config\MySql;
use App\Core\Router;

// Timezone
date_default_timezone_set(DEFAULT_TIME_ZONE);

// Connection 
$conn = new Connection(new MySql);

// Model instantiation and connection set
$model = new App\Models\Model($conn);

$router = new Router();
$router->run();

