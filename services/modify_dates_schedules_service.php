<?php
class ModifyDatesSchedulesService
{
    private PDO $conn;
    private $username = 'test';

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
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

    public function availableDisableDate(ModifyDatesSchedules $modifyDatesSchedules) // el modelo de ya existe en el controlador
    {
        try {
            $this->conn->beginTransaction();

            // primero se buscara si es que esa fecha ya existe
            $queryValidateDate = "SELECT * FROM calendar_exceptions
                                WHERE Date = :Date";

            $stmtValidate = $this->conn->prepare($queryValidateDate);
            $stmtValidate->bindParam(':Date', $modifyDatesSchedules->date, PDO::PARAM_STR);
            $stmtValidate->execute();

            $resultValidateDates = $stmtValidate->fetch(PDO::FETCH_ASSOC);

            if ($resultValidateDates['Date']) {
                // si ya existe entonces se hara una actulizacion del registro
                $queryupdateRegister = "UPDATE TOP (1) calendar_exceptions 
                                        SET StatusDate = :StatusDate
                                        WHERE Date = :Date";

                $stmtUpdateRegister = $this->conn->prepare($queryupdateRegister);
                $stmtUpdateRegister->bindParam(':StatusDate', $modifyDatesSchedules->statusDate, PDO::PARAM_STR);
                $stmtUpdateRegister->bindParam(':Date', $modifyDatesSchedules->date, PDO::PARAM_STR);
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
        try {
            $this->conn->beginTransaction();

            // primero se buscara si es que esa fecha ya existe
            $queryValidateDate = "SELECT * FROM calendar_exceptions
                                WHERE Date = :Date AND Hour = :Hour";

            $stmtValidateDate = $this->conn->prepare($queryValidateDate);
            $stmtValidateDate->bindParam(':Date', $modifyDatesSchedules->date, PDO::PARAM_STR);
            $stmtValidateDate->bindParam(':Hour', $modifyDatesSchedules->hour, PDO::PARAM_STR);
            $stmtValidateDate->execute();

            $resultValidateDates = $stmtValidateDate->fetch(PDO::FETCH_ASSOC);

            if ($resultValidateDates['Date']) {
                // si ya existe entonces se hara una actulizacion del registro
                $queryupdateRegister = "UPDATE TOP (1) calendar_exceptions 
                                        SET StatusHour = :StatusHour
                                        WHERE Date = :Date AND Hour = :Hour";

                $stmtUpdateRegister = $this->conn->prepare($queryupdateRegister);
                $stmtUpdateRegister->bindParam(':StatusDate', $modifyDatesSchedules->statusDate, PDO::PARAM_STR);
                $stmtUpdateRegister->bindParam(':Date', $modifyDatesSchedules->date, PDO::PARAM_STR);
                $stmtUpdateRegister->bindParam(':StatusHour', $modifyDatesSchedules->statusHour, PDO::PARAM_STR);
                $stmtUpdateRegister->bindParam(':Hour', $modifyDatesSchedules->hour, PDO::PARAM_STR);
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
