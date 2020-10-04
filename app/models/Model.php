<?php

namespace App\Models;

use App\Config\Conn;
use App\Traits\QueryTrait;
use App\Traits\ApiMethods;

class Model
{
    public static $conn;

    use QueryTrait;
    use ApiMethods;

    public function __construct(Conn $conn)
    {
        return self::$conn = $conn->conn;
    }
}
