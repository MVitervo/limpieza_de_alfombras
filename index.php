<?php
require './core/router.php';
require './services/consult_schedules_service.php'; // no es necesaria esta linea ya que la tengo en el archivo api.php
require './controllers/consult_schedules_controller.php';
$router = new Router();

$conn = require './database/connection.php';

$schedulesService = new SchedulesService($conn);

$controller = new AppointmentSchedulesController(
    $schedulesService
);

$router->controller(
    AppointmentSchedulesController::class,
    $controller
);

require './routes/api.php';
require './routes/web.php';

$router->dispatch();

?>