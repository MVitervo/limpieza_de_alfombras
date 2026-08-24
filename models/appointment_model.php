<?php

class Appointment {
    public string $name;
    public string $lastname;
    public string $email;
    public string $phone;
    public string $date;
    public string $schedule;

    public function __construct($name = "", $lastname = "", $email = "", $phone = "", $date = '', $schedule= "")
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phone = $phone;
        $this->date = $date;
        $this->schedule = $schedule;
    }
}


?>