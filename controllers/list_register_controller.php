<?php



// implementacion de factory
// class AppointmentFactory2
// {
//     public function createFromRequest(array $data): Appointment
//     {
//         $appointment = new Appointment(); // esta es una instancia
//         $appointment->id = $data['id'] ?? ''; // esta es una asignacion

//         return $appointment;
//     }
// }

class listRegisterController {
    private ListRegisterService $listRegister;
    private AppointmentFactory $appointmentFactory; // esta es una propiedad tipada

    public function __construct(ListRegisterService $listRegister, AppointmentFactory $appointmentFactory) // inyeccion de dependencias
    {
        $this->listRegister = $listRegister;
        $this->appointmentFactory = $appointmentFactory;
    }

    public function listRegister() {
        requireAdmin();

        echo json_encode(
            $this->listRegister->listRegister()
        );
    }

    public function editRegister() {
        requireAdmin();

        $appointment = $this->appointmentFactory->createFromRequest($_POST);

        echo json_encode(
            $this->listRegister->editRegister($appointment)
        );
    }

    public function deleteRegister() {
        requireAdmin();

        $appointment = $this->appointmentFactory->createFromRequest($_POST);

        echo json_encode(
            $this->listRegister->deleteRegister($appointment->id)
        );
    }

    public function getInformation() {
        requireAdmin();
        
        $appointment = $this->appointmentFactory->createFromRequest($_GET);

        echo json_encode(
            $this->listRegister->getInformation($appointment->id)
        );
    }
}

?>