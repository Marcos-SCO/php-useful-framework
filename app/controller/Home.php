<?php

namespace App\Controller;

use App\Core\View;
use App\Models\User;

class Home
{
    private $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function index()
    {
        $users = $this->user->select("users");

        View::render("home/index", ["title" => 'Home', "users" => $users]);
    }

    public function getUser($id)
    {
        extract($id);
        
        $user = $this->user->customQuery("SELECT * FROM users WHERE id = :id", ["id" => $id], "fetch");
        
        View::render("user/user", ["title" => $user->name, "userInfo" => $user]);
    }
}
