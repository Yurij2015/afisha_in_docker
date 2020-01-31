<?php
require_once "../../../DbConnect.php";
require_once "../../../dbsettings.php";
try {
    if (isset($_GET['idartist'])) {
        $idartist = $_GET['idartist'];
        $db = new DbConnect($host, $user, $db, $pass);
        $result = $db->connect()->query("DELETE FROM artists WHERE idartist='{$idartist}' LIMIT 1");
        $db = null;
        if($result) {
            header('location: artists.php?msg=Запись удалена!');
        } else {
            header('location: artists.php?msg=Запись нельзя удалить. Есть связанные данные!');
        }
    }
} catch (exception $e) {
    echo "Произошла ошибка!";
    echo "<br><a href = 'artists.php'>Назад</a>";
}
