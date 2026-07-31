<?php

header('Content-Type: application/json');
// require_once __DIR__ . '/../database/connection.php';
require_once __DIR__ . '/../services/consult_schedule_service.php';
$conn = require_once __DIR__ . '/../database/connection.php';
// revisar como hacer la conexion quiero fijarme en la conexion que hice en el proyecto del parque central
$function = $_GET['function'] ?? '';

$schedulesService = new SchedulesService($conn);

switch ($function) {

    case 'getAppointment':
        // getSchedules($service);
        break;

    case 'getSchedules':
        getSchedules($schedulesService);
        break;

    default:
        echo json_encode([
            'status' => false,
            'message' => 'Acción no válida.'
        ]);
        break;
}

function getSchedules(SchedulesService $schedulesService)
{
    echo json_encode(
        $schedulesService->schedules()
    );
}

?>