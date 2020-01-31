<?php $title = "Забронированные билеты" ?>
<?php
require_once "../../header.php";
?>
<div class="row">
    <div class="col-md-12">
        <?= "<h2>" . $title . "</h2>";
        ?>
        <div class="row">
            <div class="col-md-12">
                <?php
                require_once "../../../DbConnect.php";
                require_once "../../../dbsettings.php";
                require_once "Booking.php";

                try {
                    $db = new DbConnect($host, $user, $db, $pass);
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }
                ?>
                <table class="table table-hover table-bordered">
                    <tbody>
                    <tr>
                        <th>ФИО посетителя</th>
                        <th>Номер телефона</th>
                        <th>Сеанс</th>
                        <th>Ряд</th>
                        <th>Место</th>
                        <th></th>
                    </tr>
                    <?php
                    $booking = $db->connect()->query("SELECT * FROM booking ORDER BY idbook DESC ");
                    if ($booking) {
                        foreach ($booking as $row) {
                            $booking = new Booking($row['customername'], $row['phone'], $row['row'], $row['place'], $row['notes']);
                            ?>
                            <tr>
                                <td><?= $booking->customername(); ?></td>
                                <td><?= $booking->phone(); ?></td>
                                <td><?= $booking->timetable($row['timetable_id']); ?></td>
                                <td><?= $booking->row; ?></td>
                                <td><?= $booking->place; ?></td>
                                <td><?= '<a href="delete_booking.php?idbook=' . $row['idbook'] . '" class="small">Отменить</a>' ?></td>

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

