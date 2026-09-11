<?php

class Appointment {
    public int $id;
    public string $name;
    public string $lastname;
    public string $email;
    public string $phone;
    public string $date;
    public string $schedule;
    public string $lastEditBy;

    public function __construct($id = 0, $name = "", $lastname = "", $email = "", $phone = "", $date = '', $schedule= "", $lastEditBy = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phone = $phone;
        $this->date = $date;
        $this->schedule = $schedule;
        $this->lastEditBy = $lastEditBy;
    }
}


?>