<?php

require_once __DIR__ . '/../services/consult_schedules_service.php'; // con esta linea puedo acceder a los metodos del servicio
$conn = require __DIR__ . '/../database/connection.php'; // variable que contiene la conexion a la base ed datos
$schedulesService = new SchedulesService($conn); // esta linea es la inyeccion de dependencias

$controller = new AppointmentSchedulesController($schedulesService);
// $router = new Router(); // esta linea no es necesaria ya que la tenemos en el index.php

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

?>