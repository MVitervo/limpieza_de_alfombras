<?php
require './models/login_model.php';

class LoginFactory
{
    public function createFromRequest(array $data): Login
    {
        $login = new Login();
        $login->username = $data['username'] ?? ''; // esta es una asignacion
        $login->password = $data['password'] ?? ''; // esta es una asignacion
        return $login;
    }
}

class LoginController
{
    private LoginFactory $loginFactory;
    private LoginService $loginService;

    public function __controller(LoginService $loginService, LoginFactory $loginFactory)
    {
        $this->loginService = $loginService;
        $this->loginFactory = $loginFactory;
    }

    function singIn()
    {
        $login = $this->loginFactory->createFromRequest($_POST);

        echo json_encode(
            $this->loginService->login($login)
        );
    }
}
