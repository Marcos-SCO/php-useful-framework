<?php 

require_once "./boostrap.php";

use App\Controller\Users;

// User
$users = new Users();
// $user->select('users');
$router->get("/usuarios", function () {
    global $users;
    $users->index();
});
$router->post("/api/usuarios", function () {
    global $users;
    $users->createUser();
});
$router->delete("/api/usuarios", function() {
    global $users;
    $users->deleteUser();
});
$router->put("/api/usuarios", function() {
    global $users;
    $users->updateUser();
});
$router->get("/api/usuarios/{id}", function ($params) {
    // Extract variables
    extract($params);

    global $users;
    $users->getUser($id);
});

$router->dispatch();

if ($router->error()) {
    echo $router->error();
    // $router->redirect("/error/{$router->error()}");
}