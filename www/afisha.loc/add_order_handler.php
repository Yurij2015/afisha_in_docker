<?php
require_once "DbConnect.php";
require_once "dbsettings.php";
$customername = trim(htmlspecialchars($_POST['customername']));
$phone = trim(htmlspecialchars($_POST['phone']));
$timetable_id = $_POST['timetable_id'];
$row_a = $_POST['row'];
$place = $_POST['place'];
$username = $_POST['username'];

try {
    $db = new DbConnect($host, $user, $db, $pass);
} catch (PDOException $exc) {
    echo $exc->getMessage();
}
$timetable = $db->connect()->query("SELECT COUNT(*) AS count FROM booking WHERE timetable_id = '{$timetable_id}' AND row = '{$row_a}' AND place = '{$place}'");
foreach ($timetable as $row) {
    if ($row['count'] == 0) {
        $db->connect()->query("INSERT INTO booking (`customername`, `phone`, `timetable_id`, `row`, `place`, `user`) VALUES ('{$customername}','{$phone}','{$timetable_id}','{$row_a}','{$place}', '{$username}')");
        $db = null;
        header('location: personal_area.php?msg=Записано.');
    } else {
        echo "занято";
        ?>
        <button onclick="window.history.back()">Назад</button>
        <?php
    }
}
