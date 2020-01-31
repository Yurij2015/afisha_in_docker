<?php
require_once "../../../DbConnect.php";
require_once "../../../dbsettings.php";
try {
    if (isset($_GET['idrepertoire'])) {
        $idrepertoire = $_GET['idrepertoire'];
        $db = new DbConnect($host, $user, $db, $pass);
        $db->connect()->query("DELETE FROM repertoire WHERE idrepertoire='{$idrepertoire}' LIMIT 1");
        $db = null;
        header('location: repertoire_view.php?msg=Запись удалена!');
    }
} catch (exception $e) {
    echo "Запись нельзя удалить. Есть связанные данные!";
    echo "<br><a href = 'repertoire_view.php'>Назад</a>";
}
