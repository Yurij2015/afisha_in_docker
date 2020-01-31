<?php $title = "Артисты" ?>
<?php
require_once "../../header.php";
?>
<div class="row">
    <div class="col-md-12">
        <?= "<h2>" . $title . "</h2>";
        ?>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <div id="artist">
                    <?php
                    require_once "getartist.php";
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <form method="post" enctype="multipart/form-data" id="artistForm" action="addartist.php">
                    <div class="form-group">
                        <label for="name">ФИО</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea class="form-control" name="description" id="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">Загрузить фото</label>
                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                    </div>
                    <button type="button" class="btn btn-success" onmousedown="addArtist()" onclick="showArtist() ">
                        Сохранить
                    </button>
                    <button type="reset" class="btn btn-success">
                        Очистить
                    </button>
                    <span class="btn btn-success" onclick="showArtist()">
                        Обновить
                    </span>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once "../../footer.php"; ?>

