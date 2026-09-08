<?php

require './models/appointment_model.php';

/*
class listRegisterFactory {
    public function createFromRequest(array $data): Appointment
    {
        $appointment = new Appointment();
        $appointment->name = $data['name'] ?? '';
        $appointment->lastname = $data['lastname'] ?? ''; // esta es una asignacion
        $appointment->email = $data['email'] ?? ''; // esta es una asignacion
        $appointment->phone = $data['phone'] ?? ''; // esta es una asignacion
        $appointment->date = $data['date'] ?? ''; // esta es una asignacion
        $appointment->schedule = $data['schedule'] ?? ''; // esta es una asignacion
        $appointment->schedule = $data['schedule'] ?? '';
        return $appointment;
    }
}
*/

class listRegisterController {
    private ListRegisterService $listRegister;

    public function __construct(ListRegisterService $listRegister) // inyeccion de dependencias
    {
        $this->listRegister = $listRegister;
    }

    public function listRegister() {
        echo json_encode(
            $this->listRegister->listRegister()
        );
    }
}

?>