<?php

class ModifyDatesSchedules {
    public string $date;
    public string $hour;
    public string $status;

    public function __construct($date = "", $hour = "", $status = "")
    {
        $this->date = $date;
        $this->hour = $hour;
        $this->status = $status;
    }
}


?>