<?php
require_once "../../../DbConnect.php";
require_once "../../../dbsettings.php";
try {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $db = new DbConnect($host, $user, $db, $pass);
        $db->connect()->query("DELETE FROM timetable WHERE id='{$id}' LIMIT 1");
        $db = null;
        header('location: timetable_view.php?msg=Запись удалена!');
    }
} catch (exception $e) {
    echo "Запись нельзя удалить. Есть связанные данные!";
    echo "<br><a href = 'timetable_view.php'>Назад</a>";
}
