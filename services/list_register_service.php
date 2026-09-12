<?php

class ListRegisterService
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function listRegister()
    {
        $this->conn->beginTransaction();
        $resultAppointment = array();
        try {
            $queryAppointment = "SELECT
                                Id AS [id]
                                ,Name AS [name]
                                ,Lastname AS [lastname]
                                ,Email AS [email]
                                ,Phone AS [phone]
                                ,Date AS [date]
                                ,Schedule AS [schedule]
                                ,LastEditDt AS [lastEditDt]
                                FROM appointment";

            $stmtAppointment = $this->conn->prepare($queryAppointment);
            // $stmtSchedules->bindParam(':dateSelected', $date, PDO::PARAM_STR);
            $stmtAppointment->execute();

            // $resultAppointment = $stmtAppointment->fetchAll(PDO::FETCH_ASSOC);
            while ($data = $stmtAppointment->fetch(PDO::FETCH_ASSOC)) {
                $option = '<button onclick="editRegister(' . $data['id'] . ')"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                    <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                    </svg>
                            </button>
                            <button onclick="deleteRegister(' . $data['id'] . ')"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                            </svg>
                            </button>';

                $row = [
                    'name' => $data['name'],
                    'lastname' => $data['lastname'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'date' => $data['date'],
                    'schedule' => $data['schedule'],
                    'lastEditDt' => $data['lastEditDt'],
                    'options' => $option
                ];

                $resultAppointment[] = $row;
            }

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

    public function deleteRegister(int $id)
    {
        try {
            $this->conn->beginTransaction();
            $queryValidateRegister = "SELECT * FROM appointment WHERE Id = :id";

            $stmtValidateRegister = $this->conn->prepare($queryValidateRegister);
            $stmtValidateRegister->bindValue(':id', $id, PDO::PARAM_INT);
            $stmtValidateRegister->execute();

            $resultValidateRegister = $stmtValidateRegister->fetch(PDO::FETCH_ASSOC);

            // validar que no haya ningun resultado
            if (!$resultValidateRegister['Id']) {
                throw new Exception('Este registro ya fue eliminado favor de recargar la pagina');
            }

            $queryDeleteRegister = "DELETE TOP(1) FROM appointment WHERE Id = :id";

            $stmtDeleteRegister = $this->conn->prepare($queryDeleteRegister);
            $stmtDeleteRegister->bindValue(':id', $id, PDO::PARAM_INT);
            $stmtDeleteRegister->execute();

            $this->conn->commit();

            return [
                'status' => 'success',
                'message' => 'Registro eliminado correctamente'
            ];
        } catch (PDOException $e) {
            return ["status" => "error", "message" => $e];
        } catch (Exception $e) {
            return ["status" => "error", "message" => $e];
        }
    }
}
