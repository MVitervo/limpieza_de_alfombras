<?php

class ModifyDatesSchedulesFactory
{
    public function dateFactory(array $data): ModifyDatesSchedules {
        $modifyDatesSchedules = new ModifyDatesSchedules(); // esta es una instancia
        $modifyDatesSchedules->date = $data['date'] ?? ''; // esta es una asignacion
        $modifyDatesSchedules->hour = $data['hour'] ?? ''; // esta es una asignacion
        $modifyDatesSchedules->status = $data['status'] ?? ''; // esta es una asignacion

        return $modifyDatesSchedules;
    }
}

?>