<?php

namespace App\Controller;

use App\Models\User;

class Users extends User
{
    public function __construct()
    {
    }
    
    public function index() {
        var_dump($this->select('users'));
    }
    
    public function fetch($id) {
        var_dump($this->customQuery('SELECT * FROM users where id = :id', ["id" => $id]));
    }
}
