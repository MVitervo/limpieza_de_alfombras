<?php



// implementacion de factory
class AppointmentFactory2
{
    public function createFromRequest(array $data): Appointment
    {
        $appointment = new Appointment(); // esta es una instancia
        $appointment->id = $data['id'] ?? ''; // esta es una asignacion

        return $appointment;
    }
}

class listRegisterController {
    private ListRegisterService $listRegister;
    private AppointmentFactory2 $appointmentFactory; // esta es una propiedad tipada

    public function __construct(ListRegisterService $listRegister, AppointmentFactory2 $appointmentFactory) // inyeccion de dependencias
    {
        $this->listRegister = $listRegister;
        $this->appointmentFactory = $appointmentFactory;
    }

    public function listRegister() {
        echo json_encode(
            $this->listRegister->listRegister()
        );
    }

    public function deleteRegister() {

        $appointment = $this->appointmentFactory->createFromRequest($_POST);

        echo json_encode(
            $this->listRegister->deleteRegister($appointment->id)
        );
    }
}

?>