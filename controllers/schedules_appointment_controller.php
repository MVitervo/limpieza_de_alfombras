<?php

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
