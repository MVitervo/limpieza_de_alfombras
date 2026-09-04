<?php

// este archivo es unicamente para paginas esa decir mostrar puro HTML
$router->get('/', function () {

    renderView('home', [
        'title' => 'Página principal'
    ]);

});

$router->get('/login', function () {

    renderView('login', [
        'title' => 'Login'
    ]);

});

?>