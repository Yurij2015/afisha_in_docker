<?php
require_once "../../../DbConnect.php";
require_once "../../../dbsettings.php";
$date = $_POST['date'];
$time = $_POST['time'];
$duration = trim(htmlspecialchars($_POST['duration']));
$repertoire_idrepertoire = $_POST['repertoire_idrepertoire'];

if (!empty($date) && !empty($time) && !empty($duration) && !empty($repertoire_idrepertoire)) {
    try {
        $db = new DbConnect($host, $user, $db, $pass);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
    $timetable = $db->connect()->query("INSERT INTO timetable (`date`, `time`, `duration`, `repertoire_idrepertoire`) VALUES ('{$date}','{$time}','{$duration}', '{$repertoire_idrepertoire}')");
    $db = null;
    header('location: timetable_view.php?msg=Запись добавлена.');
} else {
    echo 'Empty';
}

