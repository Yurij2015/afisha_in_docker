<?php
require_once "../../../DbConnect.php";
require_once "../../../dbsettings.php";
require_once "Artist.php";

try {
    $db = new DbConnect($host, $user, $db, $pass);
} catch (PDOException $exc) {
    echo $exc->getMessage();
}
$artists = $db->connect()->query("SELECT * FROM artists ORDER BY idartist DESC ");
if ($artists) {
    foreach ($artists as $row) {
        $artist = new Artist($row['name'], $row['description'], $row['linkphoto']);
        echo "<div class='row' ><div class='col-md-12'>";
        echo $artist->name();
        echo "<img src='/admin/" . $row['linkphoto'] . "' height='250' class=\"rounded float-right\">";
        echo "<p style='min-height: 220px'>" . $artist->description() . "</p>";

        $repertoire = $db->connect()->query("SELECT repertoire.name as rname FROM repertoire JOIN repertoire_has_artist rha on repertoire.idrepertoire = rha.repertoire_idrepertoire WHERE artist_idartist={$row['idartist']}");
        foreach ($repertoire as $repertoireitem) {
            echo $repertoireitem['rname'] . "<br>";
        }

        echo "<br>";
        echo '<a href="edit_artist.php?idartist=' . $row['idartist'] . '" class="small">Редактировать</a>';
        echo " | ";
        echo '<a href="delete_artist.php?idartist=' . $row['idartist'] . '" class="small">Удалить</a><hr>';
        echo "</div></div>";


    }
}
$db = null;
