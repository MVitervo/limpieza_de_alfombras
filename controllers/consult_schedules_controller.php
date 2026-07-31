<?php

header('Content-Type: application/json');
// require_once __DIR__ . '/../database/connection.php';
require_once __DIR__ . '/../services/consult_schedule.php';

$function = $_POST['function'] ?? '';

$schedulesService = new SchedulesService();

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