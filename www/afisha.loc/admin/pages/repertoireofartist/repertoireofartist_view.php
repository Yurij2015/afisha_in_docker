<?php $title = "Репертуар артиста" ?>
<?php
require_once "../../header.php";
?>
<div class="row">
    <div class="col-md-12">
        <?= "<h2 class='mt-3'>" . $title . "</h2>";
        ?>
        <div class="row">
            <div class="col-md-12">
                <a href="add_rep_of_art.php" class="btn btn-primary float-lg-right mb-3">
                    Добавить запись
                </a>
                <?php
                require_once "../../../DbConnect.php";
                require_once "../../../dbsettings.php";
                //                require_once "Timetable.php";

                try {
                    $db = new DbConnect($host, $user, $db, $pass);
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }
                ?>
                <table class="table table-hover table-bordered">
                    <tbody>
                    <tr>
                        <th>Артист</th>
                        <th>Репертуар</th>
                        <th></th>
                    </tr>
                    <?php
                    $repertoire_has_artist = $db->connect()->query("SELECT a.idartist as aid, a.name as aname, r.idrepertoire as rid, r.name as rname, r.author as rauthor, r.description as rdescription FROM repertoire_has_artist JOIN repertoire r on repertoire_has_artist.repertoire_idrepertoire = r.idrepertoire JOIN artists a on repertoire_has_artist.artist_idartist = a.idartist ORDER BY artist_idartist DESC ");
                    if ($repertoire_has_artist) {
                        foreach ($repertoire_has_artist as $row) {
                            ?>
                            <tr>
                                <td><?= $row['aname']; ?></td>
                                <td><?= $row['rname']; ?></td>
                                <td><?= '<a href="delete_rep_or_art.php?aid=' . $row['aid'] . '&rid=' . $row['rid'] . '" class="small">Удалить</a>' ?></td>
                            </tr>
                            <?php
                        }
                    }
                    $db = null;
                    ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php require_once "../../footer.php"; ?>

