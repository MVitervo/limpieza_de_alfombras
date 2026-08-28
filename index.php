<?php
require './core/router.php';
require './core/container.php';
require './services/schedules_appointment_service.php';
require './controllers/schedules_appointment_controller.php';

$container = new Container();

$container->set(PDO::class, function () {
    return require './database/connection.php';
});

/*
$pdo = $container->get(PDO::class);

var_dump($pdo);
exit;

// este codigo es de prueba si la instruccion var_dump nos regresa algo como object(PDO)#... es que todos esta bien y pudo resolver el PDO
*/

$router = new Router($container);

require './routes/api.php';
require './routes/web.php';

$router->dispatch();

?>