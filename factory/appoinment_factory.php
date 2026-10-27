<?php

class AppointmentFactory
{
    public function createFromRequest(array $data): Appointment
    {
        $appointment = new Appointment(); // esta es una instancia
        $appointment->id = isset($data['id']) 
            ? (int) $data['id'] 
            : null; // esta es una asignacion
        $appointment->nameLastname = $data['nameLastname'] ?? ''; // esta es una asignacion
        $appointment->zodiacSign = $data['zodiacSign'] ?? ''; // esta es una asignacion
        $appointment->nationality = $data['nationality'] ?? ''; // esta es una asignacion
        $appointment->email = $data['email'] ?? ''; // esta es una asignacion
        $appointment->phone = $data['phone'] ?? ''; // esta es una asignacion
        $appointment->date = $data['date'] ?? ''; // esta es una asignacion
        $appointment->schedule = $data['schedule'] ?? ''; // esta es una asignacion

        return $appointment;
    }
}

?>