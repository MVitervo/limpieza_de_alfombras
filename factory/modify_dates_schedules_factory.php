<?php

class ModifyDatesSchedulesFactory
{
    public function dateFactory(array $data): ModifyDatesSchedules {
        $modifyDatesSchedules = new ModifyDatesSchedules(); // esta es una instancia
        $modifyDatesSchedules->date = $data['dateAvailable'] ?? ''; // esta es una asignacion
        $modifyDatesSchedules->statusDate = $data['statusDate'] ?? ''; // esta es una asignacion
        $modifyDatesSchedules->hour = $data['hourAvailable'] ?? ''; // esta es una asignacion
        $modifyDatesSchedules->statusHour = $data['statusHour'] ?? ''; // esta es una asignacion

        return $modifyDatesSchedules;
    }
}

?>