<?php

class ModifyDatesSchedulesController
{
    private ModifyDatesSchedulesService $service; // esta es una propiedad tipada
    private ModifyDatesSchedulesFactory $modifyFactory; // esta es una propiedad tipada

    public function __construct(ModifyDatesSchedulesService $service, ModifyDatesSchedulesFactory $modifyFactory) // inyeccion de dependencias
    {
        $this->service = $service;
        $this->modifyFactory = $modifyFactory;
    }

    public function getDates()
    {
        requireAdmin();

        // $date = $_GET['date'] ?? '';

        echo json_encode(
            $this->service->getDates()
        );
    }

    public function getSpecificDate()
    {
        requireAdmin();

        $getSpecificDate = $this->modifyFactory->dateFactory($_POST);

        echo json_encode(
            $this->service->getspecificDate($getSpecificDate)
        );
    }

    public function searchAppointmentDates()
    {
        requireAdmin();

        $searchAppointment = $this->modifyFactory->dateFactory($_GET);

        echo json_encode(
            $this->service->searchAppointmentDates($searchAppointment)
        );
    }

    public function modifyDate()
    {
        requireAdmin();

        // $appointment = $this->modifyFactory->createFromRequest($_POST);
        $modifyDateSchedules = $this->modifyFactory->dateFactory($_POST);

        echo json_encode(
            $this->service->availableDisableDate($modifyDateSchedules)
        );
    }

    public function searchAppointmentHourDates()
    {
        requireAdmin();

        $searchAppointment = $this->modifyFactory->dateFactory($_GET);

        echo json_encode(
            $this->service->searchAppointmentHourDates($searchAppointment)
        );
    }

    public function modifyHour()
    {
        requireAdmin();
        
        $modifyDateSchedules = $this->modifyFactory->dateFactory($_POST);

        echo json_encode(
            $this->service->availableDisableHour($modifyDateSchedules)
        );
    }
}
