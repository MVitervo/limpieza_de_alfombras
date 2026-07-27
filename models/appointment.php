<?php

class Appointment {
    public $name;
    public $lastname;
    public $email;
    public $phone;
    public $appointment;

    public function __construct($name = "", $lastname = "", $email = "", $phone = "", $appointment = "")
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phone = $phone;
        $this->appointment = $appointment;
    }
}


?>