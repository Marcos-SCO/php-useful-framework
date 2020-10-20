<?php

namespace App\Models;

class User extends Model
{
    public function __construct()
    {
        Self::$table = 'users';
    }

    public function selectAllUsers()
    {
        return $this->select();
    }

    public function selectUser($id)
    {
        extract($id);

        return $this->customQuery("SELECT * FROM " . Self::$table . " WHERE id = :id", ["id" => $id], "fetch");
    }
}
