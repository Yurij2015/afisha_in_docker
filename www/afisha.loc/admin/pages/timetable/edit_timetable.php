<?php $title = "Редактировать запись" ?>
<?php
require_once "../../header.php";
?>
<div class="row">
    <div class="col-md-12">
        <?= "<h2 class='mt-3'>" . $title . "</h2>";
        ?>
        <div class="row">
            <div class="col-md-12">
                <?php
                require_once "../../../DbConnect.php";
                require_once "../../../dbsettings.php";
                require_once "Timetable.php";
                try {
                    $db = new DbConnect($host, $user, $db, $pass);
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }
                $id = $_GET['id'];
                $timetable = $db->connect()->query("SELECT * FROM timetable WHERE id='{$id}' LIMIT 1");
                if ($timetable) {
                    foreach ($timetable as $row) {
                        $timetable = new Timetable($row['date'], $row['time'], $row['duration'], $row['repertoire_idrepertoire']);
                        ?>

                        <form method="post" enctype="multipart/form-data" id="artistForm" action="edittimetable.php">
                            <div class="form-group">
                                <label for="date">Дата</label>
                                <input type="date" class="form-control" name="date" id="date" required
                                       value="<?= $timetable->date(); ?>">
                            </div>
                            <input hidden name="id" value="<?=$id?>">
                            <div class="form-group">
                                <label for="time">Время</label>
                                <input type="time" class="form-control" name="time" id="time" required
                                       value="<?= $timetable->time(); ?>">
                            </div>
                            <div class="form-group">
                                <label for="duration">Длительность</label>
                                <input type="text" class="form-control" name="duration" id="duration" required
                                       value="<?= $timetable->duration(); ?>">
                            </div>
                            <div class="form-group">
                                <label for="repertoire_idrepertoire">Спектакль</label>
                                <select class="form-control" name="repertoire_idrepertoire"
                                        id="repertoire_idrepertoire">
                                    <option value="<?= $row['repertoire_idrepertoire']; ?>"
                                            selected><?= $timetable->repertoire($row['repertoire_idrepertoire']); ?></option>
                                    <?php
                                    $repertoire = $db->connect()->query("SELECT idrepertoire, name FROM repertoire");
                                    foreach ($repertoire as $repertoireitem) {
                                        ?>
                                        <option value="<?php echo $repertoireitem['idrepertoire'] ?>"><?php echo $repertoireitem['name'] ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                            <input type="submit" class="btn btn-success" value="Сохранить">
                            <a class="btn btn-success" href="timetable_view.php" role="button">Назад</a>
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

