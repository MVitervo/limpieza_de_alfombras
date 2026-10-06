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
    }
}
