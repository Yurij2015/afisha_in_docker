<?php
require_once "../../../DbConnect.php";
require_once "../../../dbsettings.php";
try {
    if (isset($_GET['idcomment'])) {
        $idcomment = $_GET['idcomment'];
        $db = new DbConnect($host, $user, $db, $pass);
        $db->connect()->query("DELETE FROM comments WHERE idcomment='{$idcomment}' LIMIT 1");
        $db = null;
        header('location: comments_view.php?msg=Запись удалена!');
    }
} catch (exception $e) {
    echo "Запись нельзя удалить. Есть связанные данные!";
    echo "<br><a href = 'comments_view.php'>Назад</a>";
}
