<?php

function dump($dump) {
    echo '<pre style="font-size:1.2rem;">';
        var_dump($dump);
    echo '</pre>';
    return;
}

use App\Config\Conn;
use App\Config\MySql;
use App\Models\Model;
use App\Models\User;

require_once "./app/bootstrap.php";

// Connection 
$conn = new Conn(new MySql);
// $c = new Model(new App\Config\MySql());

// $model = new Model($conn);
$user = new User($conn);
var_dump($user->select('users'));


//$select = $model->select('users');
// var_dump($select);
// var_dump($select);

/*// Select *
$select = $db->select('users');
dump($select);*/

/*// Custom query with select
$customQuery = $db->customQuery("SELECT email FROM users WHERE id = :id AND email = :email", ['id' => 2, 'email' => 'marcos_sco@outlook.com']);
*/

/* //Insert example
 $insert = $db->insert('users', ['name' => 'Iron Maiden', 'email' => 'ironmaiden@outlook.com']);
*/

/* // Update
$update = $db->update('users', ['name' => 'haha', 'email' => 'haha@outlook.com'], ['id',8]);*/

/*// Delete
$delete = $db->delete('users', ['name' => 'Seven Son', 'email' => 'sevenson@outlook.com']);
$delete = $db->delete('users', ['id' => 24]);
dump($delete);*/