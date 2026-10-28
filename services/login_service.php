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
            $this->conn->beginTransaction();

            $queryValidateUser = "SELECT * FROM usernames WHERE Username = :Username AND Password = :Password";

            $stmtValidateUser = $this->conn->prepare($queryValidateUser);
            $stmtValidateUser->bindParam(':Username', $login->username, PDO::PARAM_STR);
            $stmtValidateUser->bindParam(':Password', $login->password, PDO::PARAM_STR);
            $stmtValidateUser->execute();

            $resultValidateUser = $stmtValidateUser->fetch(PDO::FETCH_ASSOC);

            $this->conn->commit();

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

            return [
                'status' => 'success',
                'message' => 'Bienvenido.'
            ];

            /*
            if ($resultValidateUser) {
                return [
                    'status' => 'success',
                    'message' => 'Bienvenido'
                ];
            }
            else {
                return [
                    'status' => 'error',
                    'message' => 'Usuario invalido'
                ];
            }
            */
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return ['status' => false, 'message' => "Error de base de datos " . $e->getMessage()];
        }
    }
}
