<?php

class LoginService
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function login(Login $login)
    {
        try {
            $queryValidateUser = "
                SELECT Username
                FROM usernames
                WHERE Username = :Username
                AND Password = :Password
            ";

            $stmtValidateUser = $this->conn->prepare($queryValidateUser);

            $stmtValidateUser->bindValue(':Username', $login->username, PDO::PARAM_STR);
            $stmtValidateUser->bindValue(':Password', $login->password, PDO::PARAM_STR);

            $stmtValidateUser->execute();

            $resultValidateUser = $stmtValidateUser->fetch(PDO::FETCH_ASSOC);

            if (!$resultValidateUser) {
                return [
                    'status' => 'error',
                    'message' => 'Usuario o contraseña incorrectos.'
                ];
            }

            // Iniciar la sesión si todavía no existe.
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }

            // Renovar el identificador para evitar fijación de sesión.
            if (!session_regenerate_id(true)) {
                return [
                    'status' => 'error',
                    'message' => 'No fue posible iniciar la sesión.'
                ];
            }

            // Guardar la identidad autenticada.
            $_SESSION['admin_authenticated'] = true;
            $_SESSION['admin_username'] = $resultValidateUser['Username'];

            // Registrar el momento de la última actividad.
            $_SESSION['last_activity'] = time();

            return [
                'status' => 'success',
                'message' => 'Bienvenido.'
            ];
        } catch (PDOException $e) {

            return [
                'status' => 'error',
                'message' => 'Error de base de datos.'
            ];
        }
    }
}
