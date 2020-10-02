<?php

namespace App\Config;

use App\Traits\QueryTrait;

class Conn
{
    public $conn;

    use QueryTrait;

    public function __construct(DatabaseInterface $conn)
    {
        $this->conn = $conn->pdo;
    }
}
