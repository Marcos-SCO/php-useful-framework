<?php

namespace App\Controller;

use App\Models\User;
use App\Core\View;

class Users extends User
{
    public function __construct()
    {
    }

    public function index()
    {
        $users = $this->select('users');
        if ($users) {
            http_response_code(200);
            echo json_encode($users);
        }
    }

    public function createUser()
    {
        $data = $this->getContents();
        extract($data);

        // Find email in db
        $findUser = $this->customQuery("SELECT * FROM users WHERE email = :email", ["email" => $email]);

        // Password Hash
        $password = password_hash($password, PASSWORD_DEFAULT);

        if (!$findUser) {
            $this->insert("users", [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "password" => $password,
            ]);

            http_response_code(201);
            echo json_encode(
                [
                    "status" => "Usuário criado com sucesso!",
                    $data
                ]
            );
        } else {
            http_response_code(401);
            echo json_encode(
                [
                    "status" => "Erro: Usuário já existe no DB",
                ]
            );
        }
    }

    public function deleteUser()
    {
        $data = $this->getContents();
        extract($data);

        if (Auth::checkAuth()) {
            if ($this->delete("users", ["email" => $email])) {
                http_response_code(200);

                echo json_encode(
                    [
                        "status" => "Usuário deletado com sucesso!",
                        "response" => $data
                    ]
                );
            } else {
                http_response_code(404);
                echo json_encode(
                    [
                        "status" => "Usuário não podê ser deletado"
                    ]
                );
            }
        } else {
            http_response_code(401);
            echo json_encode(
                [
                    "status" => "Usuário não autenticado!"
                ]
            );
        }
    }

    public function updateUser()
    {
        $data = $this->getContents();
        extract($data);

        if (Auth::checkAuth()) {

            // Rehash password
            $password = password_hash($password, PASSWORD_DEFAULT);

            $updateUser = $this->update("users", [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "password" => $password,
                "email" => $email
            ], ["id" => $id]);

            if ($updateUser) {
                http_response_code(200);
                echo json_encode(
                    [
                        "status" => "Atualizado com sucesso!",
                        "body" => $data
                    ]
                );
            } else {
                http_response_code(401);
                echo json_encode(
                    [
                        "status" => "Não foi possível atualizar"
                    ]
                );
            }
        } else {
            http_response_code(401);
            echo json_encode(
                [
                    "status" => "Usuário não autenticado!"
                ]
            );
        }
    }

    public function getUser($id)
    {
        extract($id);
        http_response_code(200);
        $user = $this->customQuery('SELECT * FROM users where id = :id', ["id" => $id], "fetch");

        // View::render("user/user", ["title" => $user->name, "userInfo" => $user]);

        if ($user) {
            echo json_encode(
                [
                    "status" => "Usuário encontrado",
                    "response" => $user
                ]
            );
        } else {
            http_response_code(404);

            echo json_encode(
                [
                    "status" => "Usuário não encontrado"
                ]
            );
        }
    }
}
