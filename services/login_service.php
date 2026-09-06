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
        try 
        {
            $this->conn->beginTransaction();

            $queryValidateUser = "SELECT * FROM usernames WHERE Username = :Username AND Password = :Password";

            $stmtValidateUser = $this->conn->prepare($queryValidateUser);
            $stmtValidateUser->bindParam(':Username', $login->username, PDO::PARAM_STR);
            $stmtValidateUser->bindParam(':Password', $login->password, PDO::PARAM_STR);

            // continuar
        }
        catch(PDOException $e) 
        {
            $this->conn->rollBack();
            return ['status' => false, 'message' => "Error de base de datos " . $e->getMessage()];
        }
    }
}


?>