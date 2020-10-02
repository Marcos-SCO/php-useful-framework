<?php 

require "./vendor/autoload.php";

// Env variables will be in $_ENV array
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1), '.env');
$dotenv->load();
// var_dump($_ENV);

// Timezone
date_default_timezone_set($_ENV["DEFAULT_TIME_ZONE"]);