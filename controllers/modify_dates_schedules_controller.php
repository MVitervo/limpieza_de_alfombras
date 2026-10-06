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
        // $date = $_GET['date'] ?? '';

        echo json_encode(
            $this->service->getDates()
        );
    }
}
