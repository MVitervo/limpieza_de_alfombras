<?php 

header('Content-Type: application/json');
// require_once __DIR__ . '/../database/connection.php';
require_once './services/consult_schedule.php';

$function = $_POST['function'] ?? '';

$service = new schedulesService();

switch ($function) {

    case 'getSchedules':
        getSchedules($service);
        break;

    case 'getAppointment':
        getSchedules($service);
        break;

    default:
        echo json_encode([
            'status' => false,
            'message' => 'Acción no válida.'
        ]);
        break;
}

function getSchedules($service) {
        
    echo json_encode(
        $service->schedules()
    );
}



?>