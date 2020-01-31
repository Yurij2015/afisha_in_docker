<?php
require_once "../../../DbConnect.php";
require_once "../../../dbsettings.php";
try {
    if (isset($_GET['idnews'])) {
        $idnews = $_GET['idnews'];
        $db = new DbConnect($host, $user, $db, $pass);
        $db->connect()->query("DELETE FROM news WHERE idnews='{$idnews}' LIMIT 1");
        $db = null;
        header('location: news_view.php?msg=Запись удалена!');
    }
} catch (exception $e) {
    echo "Запись нельзя удалить. Есть связанные данные!";
    echo "<br><a href = 'news_view.php'>Назад</a>";
}
