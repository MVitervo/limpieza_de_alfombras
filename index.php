<?php
require './core/router.php';
require './services/consult_schedules_service.php'; // no es necesaria esta linea ya que la tengo en el archivo api.php
require './controllers/consult_schedules_controller.php';

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

// continuar con la explicacion de chatgpt de como deberia de quedar el index con esto del container ya implementado

$container = new Container();

$container->set(PDO::class, function () {
    return require './database/connection.php';
});

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

require './routes/api.php';
require './routes/web.php';

$router->dispatch();

?>