<?php

// header('Content-Type: application/json'); // esta linea no es necesario en el servicio solo en el controlador

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

    public function saveAppointment(Appointment $appointment) // el modelo de Appointment ya existe en el controlador, por lo tanto, ya lo conoce
    {
        try {
            // falta la validacion de que no este ocupado esta fecha con el horario para que no haya repetidos
            $queryValidationAppointment = 'SELECT * FROM appointment WHERE Date = :date AND Schedule = :Schedule';

            $stmtValidationAppointment = $this->conn->prepare($queryValidationAppointment);
            $stmtValidationAppointment->bindParam(':date', $appointment->date, PDO::PARAM_STR);
            $stmtValidationAppointment->bindParam(':Schedule', $appointment->schedule, PDO::PARAM_STR);
            $stmtValidationAppointment->execute();

            $resultValidationAppointment = $stmtValidationAppointment->fetch(PDO::FETCH_ASSOC);

            if ($resultValidationAppointment) {
                throw new Exception('No es posible hacer la cita, esta fecha y hora ya estan ocupadas');
            }


            $querySaveAppointment = "INSERT INTO appointment (
                Name
                ,Lastname
                ,Email
                ,Phone
                ,Date
                ,Schedule
                ,LastEditDt
                ) 
                VALUES
                (
                :Name
                ,:Lastname
                ,:Email
                ,:Phone
                ,:Date
                ,:Schedule
                ,GETDATE()
                )";

            $stmtSaveAppointment = $this->conn->prepare($querySaveAppointment);
            $stmtSaveAppointment->bindParam(':Name', $appointment->name, PDO::PARAM_STR);
            $stmtSaveAppointment->bindParam(':Lastname', $appointment->lastname, PDO::PARAM_STR);
            $stmtSaveAppointment->bindParam(':Email', $appointment->email, PDO::PARAM_STR);
            $stmtSaveAppointment->bindParam(':Phone', $appointment->phone, PDO::PARAM_STR);
            $stmtSaveAppointment->bindParam(':Date', $appointment->date, PDO::PARAM_STR);
            $stmtSaveAppointment->bindParam(':Schedule', $appointment->schedule, PDO::PARAM_STR);
            

            // $resultSaveAppointment = $stmtSaveAppointment->fetch(PDO::FETCH_ASSOC); // esta linea aplica solo los SELECT

            if ($stmtSaveAppointment->execute()) {
                return [
                    'status' => 'success',
                    'message' => 'Registro guardado'
                ];
            }

            $this->conn->commit();
        } catch (Exception $e) {
            // $this->conn->rollBack();
            return ['status' => false, 'message' => "Ocurrio un error " . $e->getMessage()];
        }
        catch (PDOException $e) {
            $this->conn->rollBack();
            return ['status' => false, 'message' => "Error de base de datos " . $e->getMessage()];
        }
    }
}
