<?php

require_once __DIR__ . '/../services/consult_schedules_service.php'; // con esta linea puedo acceder a los metodos del servicio
$conn = require __DIR__ . '/../database/connection.php'; // variable que contiene la conexion a la base ed datos
$schedulesService = new SchedulesService($conn); // esta linea es la inyeccion de dependencias

$controller = new AppointmentSchedulesController($schedulesService);
$router = new Router($container); // tanto $router como $container existen en el archivo index.php

/*
$router->get('/api/schedules', function () use ($controller) {
    $controller->getSchedules(
        $_GET["date"] ?? ""
    );
});
*/

// continuar con el paso numero 6 que menciona chatgpt

$router->get('/api/schedules', [
    AppointmentSchedulesController::class,
    'getSchedules'
]);

?>