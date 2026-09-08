<?php

class ListRegisterService {
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function listRegister() {
        $this->conn->beginTransaction();
        try {
            $queryAppointment = "SELECT 
                                Name AS [name]
                                Lastname AS [lastname]
                                Email AS [email]
                                Phone AS [phone]
                                Date AS [date]
                                Schedule AS [schedule]
                                LastEditDt AS [lastEditDt]
                                FROM appointment";

            $stmtAppointment = $this->conn->prepare($queryAppointment);
            // $stmtSchedules->bindParam(':dateSelected', $date, PDO::PARAM_STR);
            $stmtAppointment->execute();

            $resultAppointment = $stmtAppointment->fetchAll(PDO::FETCH_ASSOC);

            $this->conn->commit();

            return [
                'status' => 'success',
                'data' => $resultAppointment
            ];
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }
}

?>