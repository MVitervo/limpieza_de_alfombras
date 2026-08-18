<?php

// header('Content-Type: application/json'); // esta linea no es necesario en el servicio solo en el controlador

class SchedulesService
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function schedules(string $date)
    {
        try {

            $this->conn->beginTransaction();

            // continuar lo que debo de hacer es traerme primero todos los horarios
            // despues buscar que horarios estan ocupados para deshabilitarlos
            $querySchedules = "SELECT * FROM Schedules";

            $stmtSchedules = $this->conn->prepare($querySchedules);
            // $stmtSchedules->bindParam(':dateSelected', $date, PDO::PARAM_STR);
            $stmtSchedules->execute();

            $resultSchedules = $stmtSchedules->fetchAll(PDO::FETCH_ASSOC);

            $this->conn->commit();

            return [
                'status' => 'success',
                'data' => $resultSchedules
            ];
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return ['status' => false, 'message' => "Error de base de datos " . $e->getMessage()];
        }
        // como se esta usando una inyeccion de dependencias no es necesario destruir la conexion, pero php liberara
        // automaticamente al terminar la peticion
        // finally {
        //     $this->conn = null;
        // }
    }
}

