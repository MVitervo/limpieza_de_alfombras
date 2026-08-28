<?php

// require_once __DIR__ . '/../services/consult_schedules_service.php'; // con esta linea puedo acceder a los metodos del servicio
// $conn = require __DIR__ . '/../database/connection.php'; // variable que contiene la conexion a la base ed datos

// $schedulesService = new SchedulesService($conn);


// $controller = new AppointmentSchedulesController($schedulesService);

$router = new Router($container); // tanto $router como $container existen en el archivo index.php (Esta es una instancia)

/*
$router->get('/api/schedules', function () use ($controller) {
    $controller->getSchedules(
        $_GET["date"] ?? ""
    );
});
*/

$router->get('/api/schedules', [
    AppointmentSchedulesController::class,
    'getSchedules'
]);

$router->post('/api/saveAppointment', [
    AppointmentSchedulesController::class,
    'saveAppointment'
]);

?>