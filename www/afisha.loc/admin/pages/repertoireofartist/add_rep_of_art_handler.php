<?php
require_once "../../../DbConnect.php";
require_once "../../../dbsettings.php";
$artist_idartist = $_POST['artist_idartist'];
$repertoire_idrepertoire = $_POST['repertoire_idrepertoire'];

if (!empty($artist_idartist) && !empty($repertoire_idrepertoire)) {
    try {
        $db = new DbConnect($host, $user, $db, $pass);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
    $repertoireofartist = $db->connect()->query("INSERT INTO repertoire_has_artist (`artist_idartist`, `repertoire_idrepertoire`) VALUES ('{$artist_idartist}','{$repertoire_idrepertoire}')");
    $db = null;
    header('location: repertoireofartist_view.php?msg=Запись добавлена.');
} else {
    echo 'Empty';
}

