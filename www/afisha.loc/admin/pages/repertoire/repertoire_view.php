<?php $title = "Репертуар" ?>
<?php
require_once "../../header.php";
?>
<div class="row">

    <div class="col-md-12">
        <?= "<h2 class='mt-4'>" . $title . "</h2>";
        ?>
        <div class="row">
            <div class="col-md-12">
                <a href="add_repertoire.php" class="btn btn-primary float-lg-right mb-3">
                    Добавить запись
                </a>
                <a href="../repertoireofartist/repertoireofartist_view.php"
                   class="btn btn-primary float-lg-right mb-3 mr-3">
                    Репертуар артиста
                </a>
                <?php
                require_once "../../../DbConnect.php";
                require_once "../../../dbsettings.php";
                require_once "Repertoire.php";

                try {
                    $db = new DbConnect($host, $user, $db, $pass);
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }
                ?>
                <table class="table table-hover table-bordered">
                    <tbody>
                    <tr>
                        <th>Название спектакля</th>
                        <th>Автор</th>
                        <th>Артисты</th>
                        <th class="col-md-4">Описание</th>
                        <th>Изображение</th>
                        <th>Возврастное ограничение</th>
                        <th></th>
                    </tr>
                    <?php
                    $news = $db->connect()->query("SELECT * FROM repertoire ORDER BY idrepertoire DESC ");
                    if ($news) {
                        foreach ($news as $row) {
                            $news = new Repertoire($row['name'], $row['author'], $row['description'], $row['linkimg'], $row['agelimitation']);
                            ?>
                            <tr>
                                <td><?= $news->name(); ?></td>
                                <td><?= $news->author(); ?></td>
                                <td>
                                    <?php
                                    $repertoire = $db->connect()->query("SELECT name FROM artists JOIN repertoire_has_artist rha on artists.idartist = rha.artist_idartist WHERE repertoire_idrepertoire={$row['idrepertoire']}");
                                    foreach ($repertoire as $repertoireitem) {
                                        echo $repertoireitem['name'] . "<br>";
                                    } ?>
                                </td>
                                <td><?= $news->description(); ?></td>
                                <td><img src="/admin/<?= $row['linkimg']; ?>" width="200px"></td>

                                <td><?= $news->agelimitation(); ?></td>

                                <td><?= '<a href="delete_repertoire.php?idrepertoire=' . $row['idrepertoire'] . '" class="small">Удалить</a>' ?>
                                    <?= '<a href="edit_repertoire.php?idrepertoire=' . $row['idrepertoire'] . '" class="small">Редактировать</a>' ?>

                                </td>
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

