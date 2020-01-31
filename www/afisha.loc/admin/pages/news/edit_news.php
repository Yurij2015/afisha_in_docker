<?php $title = "Редактировать новость" ?>
<?php
require_once "../../header.php";
?>
<div class="row">
    <div class="col-md-12">
        <?= "<h2 class='mt-3'>" . $title . "</h2>";

        require_once "../../../DbConnect.php";
        require_once "../../../dbsettings.php";
        require_once "News.php";

        try {
            $db = new DbConnect($host, $user, $db, $pass);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <?php
                $idnews = $_GET['idnews'];
                $news = $db->connect()->query("SELECT * FROM news WHERE idnews='{$idnews}'");
                if ($news) {
                    foreach ($news as $row) {
                        $news = new News($row['name'], $row['description']);
                        ?>
                        <form method="post" enctype="multipart/form-data" id="artistForm" action="editnews.php">
                            <div class="form-group">
                                <label for="name">Название</label>
                                <input type="text" class="form-control" name="name" id="name"
                                       value="<?= $news->name(); ?>" required>
                            </div>
                            <input hidden name="idnews" value="<?= $idnews ?>">
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea class="form-control" name="description" id="description"
                                          required><?= $news->description(); ?></textarea>
                            </div>
                            <img src="/admin/<?= $row['linkimg']; ?>" width="300px">
                            <div class="form-group">
                                <label for="email">Загрузить новое изображение</label>
                                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload"  >
                            </div>
                            <input type="submit" class="btn btn-success" value="Сохранить">
                            <a class="btn btn-success" href="news_view.php" role="button">Назад</a>

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

