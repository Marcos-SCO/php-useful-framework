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
        $users = $this->user->selectAllUsers();

        View::render("home/index", ["title" => 'Home', "users" => $users]);
    }

    public function getUser($id)
    {
        $user = $this->user->selectUser($id);

        View::render("user/user", ["title" => $user[0]->first_name, "userInfo" => $user[0]]);
    }
}
