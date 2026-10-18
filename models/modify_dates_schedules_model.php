<?php

class ModifyDatesSchedules {
    public string $date;
    public string $statusDate;
    public string $hour;
    public string $statusHour;

    public function __construct($date = "", $statusDate = "", $hour = "", $statusHour = "")
    {
        $this->date = $date;
        $this->statusDate = $statusDate;
        $this->hour = $hour;
        $this->statusHour = $statusHour;
    }
}


?>