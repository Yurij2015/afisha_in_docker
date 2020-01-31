<?php $title = "Афиша" ?>
<?php
require_once "../../header.php";
?>
<div class="row">
    <div class="col-md-12">
        <?= "<h2 class='mt-3'>" . $title . "</h2>";
        ?>
        <div class="row">
            <div class="col-md-12">
                <a href="add_timetable.php" class="btn btn-primary float-lg-right mb-3">
                    Добавить запись
                </a>
                <?php
                require_once "../../../DbConnect.php";
                require_once "../../../dbsettings.php";
                require_once "Timetable.php";

                try {
                    $db = new DbConnect($host, $user, $db, $pass);
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }
                ?>
                <table class="table table-hover table-bordered">
                    <tbody>
                    <tr>
                        <th>Дата</th>
                        <th>Время</th>
                        <th>Длительность</th>
                        <th>Спекталь</th>
                        <th></th>
                    </tr>
                    <?php
                    $timetable = $db->connect()->query("SELECT * FROM timetable ORDER BY id DESC ");
                    if ($timetable) {
                        foreach ($timetable as $row) {
                            $timetable = new Timetable($row['date'], $row['time'], $row['duration'], $row['repertoire_idrepertoire']);
                            ?>
                            <tr>
                                <td><?= $timetable->date(); ?></td>
                                <td><?= $timetable->time(); ?></td>
                                <td><?= $timetable->duration(); ?></td>
                                <td><?= $timetable->repertoire($row['repertoire_idrepertoire']); ?></td>
                                <td><?= '<a href="delete_timetable.php?id=' . $row['id'] . '" class="small">Удалить</a>' ?>
                                | <?= '<a href="edit_timetable.php?id=' . $row['id'] . '" class="small">Редактировать</a>' ?>
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

