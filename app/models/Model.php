<?php

namespace App\Models;

use App\Config\Connection;
use App\Traits\QueryTrait;
use App\Traits\ApiMethods;

class Model
{
    public static $conn;
    public static $table;

    use QueryTrait;
    use ApiMethods;

    public function __construct(Connection $conn)
    {
        return self::$conn = $conn->connection->pdo;
    }
}
