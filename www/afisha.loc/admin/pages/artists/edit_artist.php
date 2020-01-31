<?php $title = "Редактировать информацию об артисте" ?>
<?php
require_once "../../header.php";
?>
<div class="row">
    <div class="col-md-12">
        <?= "<h2 class='mt-3'>" . $title . "</h2>";

        require_once "../../../DbConnect.php";
        require_once "../../../dbsettings.php";
        require_once "Artist.php";

        try {
            $db = new DbConnect($host, $user, $db, $pass);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <?php
                $idartist = $_GET['idartist'];
                $news = $db->connect()->query("SELECT * FROM artists WHERE idartist='{$idartist}'");
                if ($news) {
                    foreach ($news as $row) {
                        $news = new Artist($row['name'], $row['description'], $row['linkphoto']);
                        ?>
                        <form method="post" enctype="multipart/form-data" id="artistForm" action="editartist.php">
                            <div class="form-group">
                                <label for="name">Название</label>
                                <input type="text" class="form-control" name="name" id="name"
                                       value="<?= $news->name; ?>" required>
                            </div>
                            <input hidden name="idartist" value="<?= $idartist ?>">
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea class="form-control" name="description" id="description"
                                          required><?= $news->description; ?></textarea>
                            </div>
                            <img src="/admin/<?= $row['linkphoto']; ?>" width="300px">
                            <div class="form-group">
                                <label for="email">Загрузить новое изображение</label>
                                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload"  >
                            </div>
                            <input type="submit" class="btn btn-success" value="Сохранить">
                            <a class="btn btn-success" href="artists.php" role="button">Назад</a>

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

