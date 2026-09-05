<?php

// este archivo es unicamente para paginas esa decir mostrar puro HTML
$router->get('/', function () {
    require './views/home.php';
});

$router->get('/login', function () {
    require './views/login.php';
});
