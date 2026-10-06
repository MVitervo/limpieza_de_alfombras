<?php

class ModifyDatesSchedulesFactory
{
    public function createFromRequest(array $data): ModifyDatesSchedules {
        $modifyDatesSchedules = new ModifyDatesSchedules(); // esta es una instancia
        $modifyDatesSchedules->date = $data['date'] ?? ''; // esta es una asignacion
        $modifyDatesSchedules->status = $data['status'] ?? ''; // esta es una asignacion

        return $modifyDatesSchedules;
    }
}

?>