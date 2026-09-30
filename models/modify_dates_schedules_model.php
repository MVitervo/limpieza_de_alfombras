<?php

class ModifyDatesSchedules {
    public string $date;
    public string $status;

    public function __construct($date = "", $status = "")
    {
        $this->date = $date;
        $this->status = $status;
    }
}


?>