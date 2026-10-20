<?php
class ModifyDatesSchedulesService
{
    private PDO $conn;

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
            $queryValidateDate = "SELECT * FROM calendar_exceptions";

            $stmtValidate = $this->conn->prepare($queryValidateDate);
            $stmtValidate->execute();

            $resultValidateDates = $stmtValidate->fetchAll(PDO::FETCH_ASSOC);

            if ($resultValidateDates['Date']) {
                // si ya existe entonces se hara una actulizacion del registro
                $queryupdateRegister = "UPDATE TOP (1) calendar_exceptions 
                                        SET StatusDate = :StatusDate
                                        WHERE Date = :date";

                $stmtUpdateRegister = $this->conn->prepare($queryupdateRegister);
                // $stmtUpdateRegister->bindParam();
                // continuar con el resto
            } else {
                // si no existe entonces se hara una insercion del registro
                $queryInsertRegister = "INSERT INTO calendar_exceptions (
                                        ) VALUES ()";
            }
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function availableDisableHour() {}
}
