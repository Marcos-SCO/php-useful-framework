<?php

use App\Config\Conn;

require_once "./app/bootstrap.php";

function dump($dump) {
    echo '<pre style="font-size:1.2rem;">';
        var_dump($dump);
    echo '</pre>';
    return;
}

$conn = new Conn(new App\Config\MySql());

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