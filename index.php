<?php
require './core/router.php';
require './core/container.php';
require './services/consult_schedules_service.php'; // no es necesaria esta linea ya que la tengo en el archivo api.php
require './controllers/consult_schedules_controller.php';
/*
$conn = require './database/connection.php';

$schedulesService = new SchedulesService($conn);

$controller = new AppointmentSchedulesController(
    $schedulesService
);

$router = new Router();

$router->controller(
    AppointmentSchedulesController::class,
    $controller
);
*/

$container = new Container();

$container->set(PDO::class, function () {
    return require './database/connection.php';
});

/*
$pdo = $container->get(PDO::class);

var_dump($pdo);
exit;

// este codigo es de rueba si la instruccion var_dump nos regresa algo como object(PDO)#... es que todos esta bien y pudo resolver el PDO
*/

$container->set(SchedulesService::class, function ($container) {

    return new SchedulesService(
        $container->get(PDO::class)
    );

});

$container->set(
    AppointmentSchedulesController::class,
    function ($container) {

        return new AppointmentSchedulesController(
            $container->get(SchedulesService::class)
        );

    }
);

$controller = $container->get(
    AppointmentSchedulesController::class
);

$router = new Router($container);

require './routes/api.php';
require './routes/web.php';

$router->dispatch();

?>