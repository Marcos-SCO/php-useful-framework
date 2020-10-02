<?php

namespace App\Models;

use App\Config\Conn;
use App\Traits\QueryTrait;

class Model
{
    public static $conn;

    use QueryTrait;

    public function __construct(Conn $conn)
    {
        return self::$conn = $conn->conn;
    }
}
