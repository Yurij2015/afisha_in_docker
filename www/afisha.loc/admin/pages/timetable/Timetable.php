<?php
/**
 * Project: afisha
 * Filename: Timetable.php
 * Date: 12/13/2019
 * Time: 11:06 PM
 */
require_once "../../../DbConnect.php";

class Timetable
{
    public $date;
    public $time;
    public $duration;
    public $repertoire_idrepertoire;

    function __construct($date, $time, $duration, $repertoire_idrepertoire)
    {
        $this->date = $date;
        $this->time = $time;
        $this->duration = $duration;
        $this->repertoire_idrepertoire = $repertoire_idrepertoire;
    }

    public function date()
    {
        return $this->date;
    }

    public function time()
    {
        return $this->time;
    }

    public function duration()
    {
        return $this->duration;
    }

    public function repertoire($repertoire_idrepertoire)
    {
        $repertoire_name = "";
        $host = "localhost";
        $user = "afisha";
        $db = "afisha";
        $pass = "3004917779";
        $db = new DbConnect($host, $user, $db, $pass);
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