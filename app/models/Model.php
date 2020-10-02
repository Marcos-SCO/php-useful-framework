<?php

namespace App\Models;

use App\Config\Conn;
use App\Traits\QueryTrait;

class Model
{
    public $conn;

    use QueryTrait;

    public function __construct(Conn $conn)
    {
        $this->conn = $conn->conn;
    }
}
