<?php

if (isset($_GET['route'])) {
    $route = explode('/', $_GET['route']);
    
    $apiFile = $route[1] . ".php";
    
    if (is_file('./endpoints/' . $apiFile)) {
        require_once "./endpoints/" . $apiFile;
    }
}
