<?php

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