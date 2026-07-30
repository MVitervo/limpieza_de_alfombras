<?php

header('Content-Type: application/json');
require_once __DIR__ . '/../database/connection.php';

class schedulesService
{
    public function schedules()
    {
        try {

            $conn->beginTransaction();

            $querySchedules = "SELECT Schedule FROM schedules";

            $stmtSchedules = $conn->prepare($querySchedules);
            $stmtSchedules->execute();

            $resultSchedules = $stmtSchedules->fetchAll(PDO::FETCH_ASSOC);

            $conn->commit();

            return [
                'status' => 'success',
                'data' => $resultSchedules
            ];
        } catch (PDOException $e) {
            $conn->rollBack();
            return ['status' => false, 'message' => "Error de base de datos " . $e->getMessage()];
        } finally {
            $conn = null;
        }
    }
}
