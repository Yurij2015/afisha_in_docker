<?php
require_once "../../../DbConnect.php";
require_once "../../../dbsettings.php";
try {
    if (isset($_GET['idbook'])) {
        $idbook = $_GET['idbook'];
        $db = new DbConnect($host, $user, $db, $pass);
        $db->connect()->query("DELETE FROM booking WHERE idbook='{$idbook}' LIMIT 1");
        $db = null;
        header('location: booking_view.php?msg=Запись удалена!');
    }
} catch (exception $e) {
    echo "Запись нельзя удалить. Есть связанные данные!";
    echo "<br><a href = 'booking_view.php'>Назад</a>";
}
