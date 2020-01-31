<?php $title = "Добавить новость" ?>
<?php
require_once "../../header.php";
?>
<div class="row">
    <div class="col-md-12">
        <?= "<h2 class='mt-3'>" . $title . "</h2>";
        ?>
        <div class="row">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data" id="artistForm" action="addnews.php">
                    <div class="form-group">
                        <label for="name">Название</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea class="form-control" name="description" id="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">Загрузить изображение</label>
                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" required>
                    </div>
                    <input type="submit" class="btn btn-success" value="Сохранить">
                    <button type="reset" class="btn btn-success">
                        Очистить
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once "../../footer.php"; ?>

