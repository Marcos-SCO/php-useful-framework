<?php 

use App\Config\Conn;
use App\Config\MySql;

$baseDir = dirname(getcwd());
// dirname(__DIR__, 2);

// Env variables will be in $_ENV array
$dotenv = Dotenv\Dotenv::createImmutable($baseDir, '.env');
$dotenv->load();
// var_dump($_ENV);

// Timezone
date_default_timezone_set($_ENV["DEFAULT_TIME_ZONE"]);

// Connection 
$conn = new Conn(new MySql);

// Model instantiation and connection set
$model = new App\Models\Model($conn);