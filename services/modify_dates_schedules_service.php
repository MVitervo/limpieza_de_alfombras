<?php
class ModifyDatesSchedulesService
{
    private PDO $conn;
    private string $username;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        // utilizar esta variable para guardar el dato donde sea necesario
        $this->username = $_SESSION['admin_username'] ?? '';
    }

    public function getDates()
    {
        try {
            $this->conn->beginTransaction();
            $queryGetDates = "SELECT * FROM calendar_exceptions";

            $stmtGetDates = $this->conn->prepare($queryGetDates);
            $stmtGetDates->execute();

            $resultGetDates = $stmtGetDates->fetchAll(PDO::FETCH_ASSOC);

            $this->conn->commit();

            return [
                'status' => 'success',
                'data' => $resultGetDates
            ];
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function getspecificDate(ModifyDatesSchedules $specificDate)
    {
        try {
            $this->conn->beginTransaction();

            $queryGetSchedules = "SELECT * FROM calendar_exceptions WHERE Date = :Date";

            $stmtGetSchedules = $this->conn->prepare($queryGetSchedules);
            $stmtGetSchedules->bindParam(':Date', $specificDate->date, PDO::PARAM_STR);
            $stmtGetSchedules->execute();

            $resultGetSchedules = $stmtGetSchedules->fetchAll(PDO::FETCH_ASSOC);

            $this->conn->commit();
            if (!empty($resultGetSchedules)) {
                return [
                    'status' => 'success',
                    'data' => $resultGetSchedules
                ];
            } else {
                return [
                    'status' => 'success',
                    'data' => 'No hay datos'
                ];
            }
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function getActiveAppointment(ModifyDatesSchedules $specificDate)
    {
        try {
            $this->conn->beginTransaction();

            $queryGetAppointment = "SELECT * FROM appointment WHERE Date = :Date";

            $stmtGetAppointment = $this->conn->prepare($queryGetAppointment);
            $stmtGetAppointment->bindParam(':Date', $specificDate->date, PDO::PARAM_STR);
            $stmtGetAppointment->execute();

            $resultGetAppointment = $stmtGetAppointment->fetchAll(PDO::FETCH_ASSOC);

            $this->conn->commit();
            if (!empty($resultGetAppointment)) {
                return [
                    'status' => 'success',
                    'data' => $resultGetAppointment
                ];
            } else {
                return [
                    'status' => 'success',
                    'data' => 'No hay datos'
                ];
            }
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function searchAppointmentDates(ModifyDatesSchedules $modifyDatesSchedules)
    {
        try {
            $this->conn->beginTransaction();
            $querySearchAppointments = "SELECT Id, NameLastname FROM appointment
                                        WHERE Date = :Date";

            $stmtSearchAppointments = $this->conn->prepare($querySearchAppointments);
            $stmtSearchAppointments->bindParam(':Date', $modifyDatesSchedules->date, PDO::PARAM_STR);
            $stmtSearchAppointments->execute();

            $resultSearchAppointments = [];

            while ($data = $stmtSearchAppointments->fetch(PDO::FETCH_ASSOC)) {
                $register = [
                    "Id" => $data['Id'],
                    "NameLastname" => $data['NameLastname']
                ];

                $resultSearchAppointments[] = $register;
            }

            $this->conn->commit();

            if (!empty($resultSearchAppointments)) {
                return [
                    'status' => 'success',
                    'data' => $resultSearchAppointments
                ];
            } else {
                return [
                    'status' => 'success',
                    'message' => 'No hay citas'
                ];
            }
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function searchAppointmentHourDates(ModifyDatesSchedules $modifyDatesSchedules)
    {
        try {
            $this->conn->beginTransaction();
            $querySearchAppointments = "SELECT Id, NameLastname FROM appointment
                                        WHERE Date = :Date AND Schedule = :Schedule";

            $stmtSearchAppointments = $this->conn->prepare($querySearchAppointments);
            $stmtSearchAppointments->bindParam(':Date', $modifyDatesSchedules->date, PDO::PARAM_STR);
            $stmtSearchAppointments->bindParam(':Schedule', $modifyDatesSchedules->hour, PDO::PARAM_STR);
            $stmtSearchAppointments->execute();

            $resultSearchAppointments = [];

            while ($data = $stmtSearchAppointments->fetch(PDO::FETCH_ASSOC)) {
                $register = [
                    "Id" => $data['Id'],
                    "NameLastname" => $data['NameLastname']
                ];

                $resultSearchAppointments[] = $register;
            }

            $this->conn->commit();

            if (!empty($resultSearchAppointments)) {
                return [
                    'status' => 'success',
                    'data' => $resultSearchAppointments
                ];
            } else {
                return [
                    'status' => 'success',
                    'message' => 'No hay citas'
                ];
            }
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function availableDisableDate(ModifyDatesSchedules $modifyDatesSchedules) // el modelo de ya existe en el controlador
    {
        // revisar todas las personas con esa fecha y avisar
        try {
            $this->conn->beginTransaction();
            $username = $this->username;

            // primero se buscara si es que esa fecha ya existe
            $queryValidateDate = "SELECT * FROM calendar_exceptions
                                WHERE Date = :Date";

            $stmtValidate = $this->conn->prepare($queryValidateDate);
            $stmtValidate->bindParam(':Date', $modifyDatesSchedules->date, PDO::PARAM_STR);
            $stmtValidate->execute();

            $resultValidateDates = $stmtValidate->fetch(PDO::FETCH_ASSOC);

            if (!empty($resultValidateDates['Date'])) {
                // validacion

                // si ya existe entonces se hara una actualizacion del registro
                $queryupdateRegister = "UPDATE calendar_exceptions 
                                        SET StatusDate = :StatusDate,
                                        LastEditBy = :LastEditBy
                                        WHERE Date = :Date";

                $stmtUpdateRegister = $this->conn->prepare($queryupdateRegister);
                $stmtUpdateRegister->bindParam(':StatusDate', $modifyDatesSchedules->statusDate, PDO::PARAM_STR);
                $stmtUpdateRegister->bindParam(':Date', $modifyDatesSchedules->date, PDO::PARAM_STR);
                $stmtUpdateRegister->bindParam(':LastEditBy', $username, PDO::PARAM_STR);
                $stmtUpdateRegister->execute();
            } else {
                // si no existe entonces se hara una insercion del registro
                $queryInsertRegister = "INSERT INTO calendar_exceptions (
                                        Date
                                        ,StatusDate
                                        ,LastEditBy
                                        ,LastEditDt
                                        )
                                        VALUES (
                                        :Date
                                        ,:StatusDate
                                        ,:LastEditBy
                                        ,GETDATE()
                                        )";

                $stmtInsertRegister = $this->conn->prepare($queryInsertRegister);
                $stmtInsertRegister->bindParam(':Date', $modifyDatesSchedules->date, PDO::PARAM_STR);
                $stmtInsertRegister->bindParam(':StatusDate', $modifyDatesSchedules->statusDate, PDO::PARAM_STR);
                $stmtInsertRegister->bindParam(':LastEditBy', $username, PDO::PARAM_STR);
                $stmtInsertRegister->execute();
            }

            $this->conn->commit();

            return [
                'status' => 'success',
                'message' => 'fecha actualizada'
            ];
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function availableDisableHour(ModifyDatesSchedules $modifyDatesSchedules)
    {
        // revisar si hay una persona con esa fecha y hora para avisar
        try {
            $this->conn->beginTransaction();
            $username = $this->username;

            // primero se buscara si es que esa fecha ya existe
            $queryValidateDate = "SELECT * FROM calendar_exceptions
                                WHERE Date = :Date AND Hour = :Hour";

            $stmtValidateDate = $this->conn->prepare($queryValidateDate);
            $stmtValidateDate->bindParam(':Date', $modifyDatesSchedules->date, PDO::PARAM_STR);
            $stmtValidateDate->bindParam(':Hour', $modifyDatesSchedules->hour, PDO::PARAM_STR);
            $stmtValidateDate->execute();

            $resultValidateDates = $stmtValidateDate->fetch(PDO::FETCH_ASSOC);



            if (!empty($resultValidateDates['Date'])) {
                // si ya existe entonces se hara una actulizacion del registro
                $queryupdateRegister = "UPDATE TOP (1) calendar_exceptions 
                                        SET StatusHour = :StatusHour,
                                        LastEditBy = :LastEditBy
                                        WHERE Date = :Date AND Hour = :Hour";

                $stmtUpdateRegister = $this->conn->prepare($queryupdateRegister);
                $stmtUpdateRegister->bindParam(':Date', $modifyDatesSchedules->date, PDO::PARAM_STR);
                $stmtUpdateRegister->bindParam(':StatusHour', $modifyDatesSchedules->statusHour, PDO::PARAM_STR);
                $stmtUpdateRegister->bindParam(':Hour', $modifyDatesSchedules->hour, PDO::PARAM_STR);
                $stmtUpdateRegister->bindParam(':LastEditBy', $username, PDO::PARAM_STR);
                $stmtUpdateRegister->execute();
                // continuar debo de cambiar el tipo de dato en la columna Hour de sql server para que funcione esto de aqui
            } else {
                // si no existe entonces se hara una insercion del registro
                $queryInsertRegister = "INSERT INTO calendar_exceptions (
                                        Date
                                        ,StatusDate
                                        ,Hour
                                        ,StatusHour
                                        ,LastEditBy
                                        ,LastEditDt
                                        )
                                        VALUES (
                                        :Date
                                        ,:StatusDate
                                        ,:Hour
                                        ,:StatusHour
                                        ,:LastEditBy
                                        ,GETDATE()
                                        )";

                $stmtInsertRegister = $this->conn->prepare($queryInsertRegister);
                $stmtInsertRegister->bindParam(':Date', $modifyDatesSchedules->date, PDO::PARAM_STR);
                $stmtInsertRegister->bindParam(':StatusDate', $modifyDatesSchedules->statusDate, PDO::PARAM_STR);
                $stmtInsertRegister->bindParam(':Hour', $modifyDatesSchedules->hour, PDO::PARAM_STR);
                $stmtInsertRegister->bindParam(':StatusHour', $modifyDatesSchedules->statusHour, PDO::PARAM_STR);
                $stmtInsertRegister->bindParam(':LastEditBy', $username, PDO::PARAM_STR);
                $stmtInsertRegister->execute();
            }

            $this->conn->commit();

            return [
                'status' => 'success',
                'message' => 'Hora actualizada'
            ];
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }
}
