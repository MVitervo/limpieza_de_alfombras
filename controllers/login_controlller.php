<?php
require './models/login_model.php';

class LoginFactory
{
    public function createFromRequest(array $data): Login
    {
        $login = new Login();
        // los nombres que estan en el data son los nombre que tiene la propiedad de name en el formulario
        $login->username = $data['username'] ?? ''; // esta es una asignacion
        $login->password = $data['password'] ?? ''; // esta es una asignacion
        return $login;
    }
}

class LoginController
{
    private LoginFactory $loginFactory;
    private LoginService $loginService;

    public function __construct(LoginService $loginService, LoginFactory $loginFactory)
    {
        $this->loginService = $loginService;
        $this->loginFactory = $loginFactory;
    }

    function singIn()
    {
        header('Content-Type: application/json; charset=utf-8'); // gpt
        $login = $this->loginFactory->createFromRequest($_POST);

        echo json_encode(
            $this->loginService->login($login)
        );
    }

    public function logout()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();

        http_response_code(200);
        header('Content-Type: application/json; charset=utf-8');

        echo json_encode([
            'status' => 'success',
            'message' => 'Sesión cerrada correctamente.'
        ]);
    }
}
