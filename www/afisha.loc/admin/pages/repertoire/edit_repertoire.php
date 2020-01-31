<?php $title = "Редактировать запись репертуара" ?>
<?php
require_once "../../header.php";
?>
<div class="row">
    <div class="col-md-12">
        <?= "<h2 class='mt-3'>" . $title . "</h2>";

        require_once "../../../DbConnect.php";
        require_once "../../../dbsettings.php";
        require_once "Repertoire.php";

        try {
            $db = new DbConnect($host, $user, $db, $pass);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <?php
                $idrepertoire = $_GET['idrepertoire'];
                $repertoire = $db->connect()->query("SELECT * FROM repertoire WHERE idrepertoire='{$idrepertoire}'");
                if ($repertoire) {
                    foreach ($repertoire as $row) {
                        $repertoire = new Repertoire($row['name'], $row['author'], $row['description'], $row['linkimg'], $row['agelimitation']);
                        ?>
                        <form method="post" enctype="multipart/form-data" id="artistForm" action="editrepertoire.php">
                            <div class="form-group">
                                <label for="name">Название</label>
                                <input type="text" class="form-control" name="name" id="name"
                                       value="<?= $repertoire->name(); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="author">Автор</label>
                                <input type="text" class="form-control" name="author" id="author"
                                       value="<?= $repertoire->author(); ?>" required>
                            </div>
                            <input hidden name="idrepertoire" value="<?= $idrepertoire ?>">
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea class="form-control" name="description" id="description"
                                          required><?= $repertoire->description(); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="agelimitation">Возврастное ограничение</label>
                                <input type="text" class="form-control" name="agelimitation" id="agelimitation"
                                       value="<?= $repertoire->agelimitation(); ?>" required>
                            </div>
                            <img src="/admin/<?= $row['linkimg']; ?>" width="300px">
                            <div class="form-group">
                                <label for="email">Загрузить новое изображение</label>
                                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload"  >
                            </div>
                            <input type="submit" class="btn btn-success" value="Сохранить">
                            <a class="btn btn-success" href="repertoire_view.php" role="button">Назад</a>

                        </form>
                        <?php

                    }
                }
                $db = null;

                ?>
            </div>
        </div>
    </div>
</div>
<?php require_once "../../footer.php"; ?>

