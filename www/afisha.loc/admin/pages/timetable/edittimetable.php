<?php
require_once "../../../DbConnect.php";
require_once "../../../dbsettings.php";
$id = $_POST['id'];

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
    $timetable = $db->connect()->query("UPDATE timetable SET `date` = '{$date}', `time` = '{$time}', `duration` = '{$duration}', `repertoire_idrepertoire` = '{$repertoire_idrepertoire}' WHERE id = '{$id}'");
    $db = null;
    header('location: timetable_view.php?msg=Запись обновлена.');
} else {
    echo 'Empty';
}