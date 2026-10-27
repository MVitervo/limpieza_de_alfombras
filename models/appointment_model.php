<?php

class Appointment {
    public ?int $id = null;
    public string $nameLastname;
    public string $zodiacSign;
    public string $nationality;
    public string $email;
    public string $phone;
    public string $date;
    public string $schedule;
    public string $lastEditBy;

    public function __construct($id = 0, $nameLastname = "", $zodiacSign = "", $nationality = "", $email = "", $phone = "", $date = '', $schedule= "", $lastEditBy = "")
    {
        $this->id = $id;
        $this->nameLastname = $nameLastname;
        $this->zodiacSign = $zodiacSign;
        $this->nationality = $nationality;
        $this->email = $email;
        $this->phone = $phone;
        $this->date = $date;
        $this->schedule = $schedule;
        $this->lastEditBy = $lastEditBy;
    }
}


?>