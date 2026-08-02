<?php

header('Content-Type: application/json');
require_once __DIR__ . '/../services/consult_schedules_service.php'; // con esta linea puedo acceder a los metodos del servicio
$conn = require __DIR__ . '/../database/connection.php'; // variable que contiene la conexion a la base ed datos
$schedulesService = new SchedulesService($conn); // esta linea es la inyeccion de dependencias

// Variables que recibe del ajax
$function = $_GET['function'] ?? '';
$date = $_GET['date'] ?? '';

switch ($function) {

    case 'getAppointment':
        // getSchedules($service);
        break;

    case 'getSchedules':
        getSchedules($schedulesService, $date);
        break;

    default:
        echo json_encode([
            'status' => false,
            'message' => 'Acción no válida.'
        ]);
        break;
}

function getSchedules(SchedulesService $schedulesService, string $date)
{
    echo json_encode(
        $schedulesService->schedules($date)
    );
}

?>