<?php
/**
 * Project: afisha
 * Filename: Booking.php
 * Date: 12/13/2019
 * Time: 2:49 PM
 */

class Booking
{
    public $customername;
    public $phone;
    public $row;
    public $place;
    public $notes;

    private $host = "localhost";
    private $user = "afisha";
    private $db = "afisha";
    private $pass = "3004917779";

    function __construct($customername, $phone, $row, $place, $notes)
    {
        $this->customername = $customername;
        $this->phone = $phone;
        $this->row = $row;
        $this->place = $place;
        $this->notes = $notes;
    }

    public function customername()
    {
        return $this->customername;
    }

    public function phone()
    {
        return $this->phone;
    }

    public function timetable($timetable_id)
    {
        $timetable_data = "";
        $db = new DbConnect($this->host, $this->user, $this->db, $this->pass);
        $timetable = $db->connect()->query("SELECT * FROM timetable WHERE id = '{$timetable_id}'");
        if ($timetable) {
            foreach ($timetable as $row) {
                $timetable_data = "Дата: " .
                    $row['date'] . " <br>Время: " .
                    $row['time'] . " <br>Спекталь:  " .
                    $this->repertoire($row['repertoire_idrepertoire']);
            }
        }
        $db = null;
        return $timetable_data;
    }

    public function repertoire($repertoire_idrepertoire)
    {
        $repertoire_name = "";
        $db = new DbConnect($this->host, $this->user, $this->db, $this->pass);
        $repertoire = $db->connect()->query("SELECT name FROM repertoire WHERE idrepertoire = '{$repertoire_idrepertoire}'");
        if ($repertoire) {
            foreach ($repertoire as $row) {
                $repertoire_name = $row['name'];
            }
        }
        $db = null;
        return $repertoire_name;
    }


}

