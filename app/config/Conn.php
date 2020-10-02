<?php

namespace App\Config;

use App\Interfaces\DatabaseInterface;

class Conn
{
    public $conn;

    public function __construct(DatabaseInterface $conn)
    {
        return $this->conn = $conn->pdo;
    }
}
