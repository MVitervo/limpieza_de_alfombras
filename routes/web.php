<?php

// este archivo es unicamente para paginas esa decir mostrar puro HTML
$router->get('/', function () {
    require './views/home.php';
});

// se tuvo que dejar la misma ruta para que cargue todos los estilos, pero si es posible indicarle que entre a /login 
// este /login puede ser cualquier otro nombre
$router->get('/login', function () {
    require './views/home.php';
});
