<?php

class AppointmentFactory
{
    public function createFromRequest(array $data): Appointment
    {
        $appointment = new Appointment(); // esta es una instancia
        $appointment->id = $data['id'] ?? ''; // esta es una asignacion
        $appointment->name = $data['name'] ?? ''; // esta es una asignacion
        $appointment->lastname = $data['lastname'] ?? ''; // esta es una asignacion
        $appointment->email = $data['email'] ?? ''; // esta es una asignacion
        $appointment->phone = $data['phone'] ?? ''; // esta es una asignacion
        $appointment->date = $data['date'] ?? ''; // esta es una asignacion
        $appointment->schedule = $data['schedule'] ?? ''; // esta es una asignacion

        return $appointment;
    }
}

?>