<?php

header('Content-Type: application/json');
require_once __DIR__ . '/../database/connection.php';

class SchedulesService
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function schedules()
    {
        try {

            $this->$conn->beginTransaction();

            $querySchedules = "SELECT Schedule FROM schedules";

            $stmtSchedules = $this->$conn->prepare($querySchedules);
            $stmtSchedules->execute();

            $resultSchedules = $stmtSchedules->fetchAll(PDO::FETCH_ASSOC);

            $this->$conn->commit();

            return [
                'status' => 'success',
                'data' => $resultSchedules
            ];
        } catch (PDOException $e) {
            $this->$conn->rollBack();
            return ['status' => false, 'message' => "Error de base de datos " . $e->getMessage()];
        } finally {
            $conn = null;
        }
    }
}
