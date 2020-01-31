<?php
$title = "Забронировать билет";
require_once "public_header.php";
?>
<div class="container">
    <div class="row afisha">
        <div class="starthead bg-dark">
            <h1 class="starthead-center">Афиша</h1>
        </div>
        <div class="row contentafisha">
            <div class="calendar contentafisha-center">
                <form method="post" action="search_date.php#search_date">
                    <div class="input-group ml-5" style="margin-top: 10px;">
                        <label>
                            <input placeholder="Календарь" type="text" onfocus="(this.type='date')"
                                   onblur="(this.type='text')" id="date"
                                   class="form-control form-control-sm font-weight-bold mt-0" style="width: 210px"
                                   name="search">
                        </label>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary fa fa-search mb-1" type="submit"
                                    style="background: transparent; color: white; border: none;"></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="emptyplace"></div>
            <div class="search">
                <form method="post" id="searchrequest" action="search.php">
                    <label for="search"></label>
                    <input placeholder="Поиск по спектаклям, артистам" id="search" name="search">
                    <button type="submit" class="fa fa-search"
                            style="background: transparent; color: white; border: none"></button>
                </form>
            </div>
            <?php
            $date = $_GET['date'];
            $time = $_GET['time'];
            $name = $_GET['name'];
            $timetable = $_GET['timetable'];
            ?>
            <div class="container">
                <div class="content" id="comments">
                    <div class="row col-md-12 mb-3 mt-3">
                        <div class="col-md-12">
                            <p>Вы бронируете место на спектакль <?= $name ?>, дата <?= $date ?>, время <?= $time ?> </p>
                            <hr class="mb-3">
                            <?php
                            $init_row = 11;
                            $init_place = 16;
                            for ($_row = 1; $_row <= $init_row - 6; $_row++) {
                                ?>
                                <div class="row">
                                    <div class="col hoverDiv"><?= $_row ?></div>
                                    <?php
                                    for ($_place = 1; $_place <= $init_place; $_place++) {
                                        ?>
                                        <div class="col card hoverDiv
                                        <?php
                                        require_once "DbConnect.php";
                                        require_once "dbsettings.php";
                                        try {
                                            $db = new DbConnect("localhost", "afisha", "afisha", "3004917779");
                                        } catch (PDOException $exc) {
                                            echo $exc->getMessage();
                                        }
                                        $res = $db->connect()->query("SELECT css_style FROM booking WHERE row = $_row AND place = $_place AND timetable_id = $timetable");
                                        foreach ($res as $row) {
                                            echo $row['css_style'];
                                        }
                                        ?>">
                                            <a href="/information.php?id=<?= $timetable ?>&<?= $_place ?>"
                                               class="nounderLine"><?= $_place ?>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                            <hr class="mt-3 mb-3">
                            <?php
                            for ($_row = 6; $_row <= $init_row; $_row++) {
                                ?>
                                <div class="row">
                                    <div class="col hoverDiv"><?= $_row ?></div>
                                    <?php
                                    for ($_place = 1; $_place <= $init_place + 1; $_place++) {
                                        ?>
                                        <div class="col card hoverDiv
                                        <?php
                                        $res = $db->connect()->query("SELECT css_style FROM booking WHERE row = $_row AND place = $_place AND timetable_id = $timetable");
                                        foreach ($res as $row) {
                                            echo $row['css_style'];
                                        }
                                        ?>">
                                            <a href="/information.php?id=<?= $timetable ?>&<?= $_place ?>"
                                               class="nounderLine"><?= $_place ?>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                            <hr class="mt-3 mb-3">
                            <form method="post" enctype="multipart/form-data" id="artistForm"
                                  action="add_order_handler.php">
                                <?= Session::get('email'); ?>
                                <label>
                                    <input hidden name="username" value="<?= Session::get('email'); ?>">
                                </label>
                                <div class="form-group">
                                    <label for="customername" class="float-left">Ваше имя</label>
                                    <input type="text" class="form-control" name="customername" id="customername"
                                           required>
                                </div>
                                <label>
                                    <input hidden name="timetable_id" value="<?= $timetable ?>">
                                </label>
                                <div class="form-group">
                                    <label for="phone" class="float-left">Номер телефона</label>
                                    <input type="text" class="form-control" name="phone" id="phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="row" class="float-left">Ряд</label>
                                    <select class="form-control" name="row" id="row">
                                        <?php
                                        for ($row = 1; $row <= $init_row; $row++) {
                                            ?>
                                            <option value="<?= $row ?>"><?= $row ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="place" class="float-left">Место</label>
                                    <select class="form-control" name="place" id="place">
                                        <?php
                                        for ($place = 1; $place <= $init_place + 1; $place++) {
                                            ?>
                                            <option value="<?= $place ?>"><?= $place ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-danger float-right" value="Сохранить">
                                <button type="reset" class="btn btn-danger float-right mr-2">
                                    Очистить
                                </button>
                            </form>
                        </div>
                    </div>
                    <hr>

                </div>
            </div>
        </div>
    </div>
    <?php require_once "footer.php"; ?>
</div>
</div>
</body>
</html>