<?php $title = "Добавить запись в расписание" ?>
<?php
require_once "../../header.php";
?>
<div class="row">
    <div class="col-md-12">
        <?= "<h2 class='mt-3'>" . $title . "</h2>";
        ?>
        <div class="row">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data" id="artistForm" action="addtimetable.php">
                    <div class="form-group">
                        <label for="date">Дата</label>
                        <input type="date" class="form-control" name="date" id="date" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Время</label>
                        <input type="time" class="form-control" name="time" id="time" required>
                    </div>
                    <div class="form-group">
                        <label for="duration">Длительность</label>
                        <input type="text" class="form-control" name="duration" id="duration" required>
                    </div>
                    <div class="form-group">
                        <label for="repertoire_idrepertoire">Спектакль</label>
                        <select class="form-control" name="repertoire_idrepertoire" id="repertoire_idrepertoire">
                            <?php
                            require_once "../../../DbConnect.php";
                            require_once "../../../dbsettings.php";
                            $db = new DbConnect($host, $user, $db, $pass);
                            $repertoire = $db->connect()->query("SELECT idrepertoire, name FROM repertoire");
                            foreach ($repertoire as $repertoireitem) {
                                ?>
                                <option value="<?php echo $repertoireitem['idrepertoire'] ?>"><?php echo $repertoireitem['name'] ?></option>
                            <?php } ?>
                        </select>

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

