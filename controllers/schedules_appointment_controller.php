<?php

// header('Content-Type: application/json'); // comente esta linea por que me regresa el json tal cual en el HTML
// seran enviadas como tipo json

// require_once __DIR__ . '/../services/consult_schedules_service.php'; // con esta linea puedo acceder a los metodos del servicio
// $conn = require __DIR__ . '/../database/connection.php'; // variable que contiene la conexion a la base ed datos
// $schedulesService = new SchedulesService($conn); // esta linea es la inyeccion de dependencias

// Variables que recibe del ajax
// $function = $_GET['function'] ?? '';
// $date = $_GET['date'] ?? '';

require './models/appointment_model.php';

// implementacion de factory
class AppointmentFactory
{
    public function createFromRequest(array $data): Appointment
    {
        $appointment = new Appointment(); // esta es una instancia
        $appointment->name = $data['name'] ?? ''; // esta es una asignacion
        $appointment->lastname = $data['lastname'] ?? ''; // esta es una asignacion
        $appointment->email = $data['email'] ?? ''; // esta es una asignacion
        $appointment->phone = $data['phone'] ?? ''; // esta es una asignacion
        $appointment->date = $data['date'] ?? ''; // esta es una asignacion
        $appointment->schedule = $data['schedule'] ?? ''; // esta es una asignacion

        return $appointment;
    }
}

class AppointmentSchedulesController
{
    /*
    Nota: la clase SchedulesService la puede encontrar en este punto ya que se importo desde el archivo index.php
    con la instruccion: require './services/schedules_appointment_service.php';
    */
    private SchedulesService $service; // esta es una propiedad tipada
    private AppointmentFactory $appointmentFactory; // esta es una propiedad tipada

    public function __construct(SchedulesService $service, AppointmentFactory $appointmentFactory) // inyeccion de dependencias
    {
        $this->service = $service;
        $this->appointmentFactory = $appointmentFactory;
    }

    public function getSchedules()
    {
        // $date = $_GET['date'] ?? '';

        echo json_encode(
            $this->service->schedules()
        );
    }

    public function saveAppointment()
    {
        // $date = $_GET['date'] ?? '';
        // $appointment = new Appointment();

        $appointment = $this->appointmentFactory->createFromRequest($_POST);
        /*
        $this->appointment->name = $_POST['name'] ?? '';
        $this->appointment->lastname = $_POST['lastname'] ?? '';
        $this->appointment->email = $_POST['email'] ?? '';
        $this->appointment->phone = $_POST['phone'] ?? '';
        $this->appointment->date = $_POST['date'] ?? '';
        $this->appointment->schedule = $_POST['schedule'] ?? '';
        */

        echo json_encode(
            $this->service->saveAppointment($appointment)
        );
    }
}

/*
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
*/

/*
function getSchedules(SchedulesService $schedulesService, string $date)
{
    echo json_encode(
        $schedulesService->schedules($date)
    );
}
*/
