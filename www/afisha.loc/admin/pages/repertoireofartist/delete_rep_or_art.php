<?php
require_once "../../../DbConnect.php";
require_once "../../../dbsettings.php";
try {
    if (isset($_GET['aid']) && isset($_GET['rid'])) {
        $aid = $_GET['aid'];
        $rid = $_GET['rid'];
        $db = new DbConnect($host, $user, $db, $pass);
        $db->connect()->query("DELETE FROM repertoire_has_artist WHERE artist_idartist='{$aid}' AND repertoire_idrepertoire='{$rid}'  LIMIT 1");
        $db = null;
        header('location: repertoireofartist_view.php?msg=Запись удалена!');
    }
} catch (exception $e) {
    echo "Ошибка!";
    echo "<br><a href = 'repertoireofartist_view.php'>Назад</a>";
}
