<?php

namespace App\Controllers;

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

        // dd($user['usuario']);


        View::render("home/index", ["title" => 'Home', "users" => $users]);
    }

    public function getUser($id)
    {
        $id = $id['usuario'];
        $user = $this->user->selectUser($id);

        View::render("user/user", ["title" => $user->first_name, "userInfo" => $user]);
    }
}
