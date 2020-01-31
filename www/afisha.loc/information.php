<?php
$title = "Информация о спектакле";
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
            <div class="container">
                <div class="content">
                    <?php
                    $id = $_GET['id'];
                    $timetable = $db->connect()->query("SELECT * FROM timetable JOIN repertoire ON timetable.repertoire_idrepertoire = repertoire.idrepertoire WHERE id = '{$id}' ORDER BY id DESC ");
                    if ($timetable) {
                        foreach ($timetable as $row) {
                            ?>
                            <div class="row col-md-12 mb-5 mt-5">
                                <div class="col-md-12" id="info">
                                    <img src="/admin/<?= $row['linkimg']; ?>" width="400px"
                                         class="float-left mr-3">
                                    <p class="text-justify mb-0"><span
                                                class="font-weight-bold"> Дата:</span> <?= $row['date'] . "&nbsp;" . $row['time']; ?>
                                    </p>
                                    <p class="text-justify mb-0"><span
                                                class="font-weight-bold">Название:</span> <?= $row['name']; ?></p>
                                    <p class="text-justify mb-0">
                                        <span class="font-weight-bold">Стоимость:</span>
                                        <?= $row['cost']; ?> -
                                        <?= ($row['cost'] * 0.3) + $row['cost']; ?>
                                    </p>
                                    <p class="text-justify mb-0"><span
                                                class="font-weight-bold">Ограничение по возрасту:</span> <?= $row['agelimitation']; ?>
                                    </p>
                                    <p class="text-justify mb-1"><span
                                                class="font-weight-bold">Автор:</span> <?= $row['author']; ?></p>
                                    <p class="text-justify"><span
                                                class="font-weight-bold">Описание: </span><?= $row['description']; ?>
                                    </p>

                                    <p class="text-justify"><span
                                                class="font-weight-bold text-danger">Артист(ы):
                                        <?php
                                        $repertoire = $db->connect()->query("SELECT name FROM artists JOIN repertoire_has_artist rha on artists.idartist = rha.artist_idartist WHERE repertoire_idrepertoire={$row['idrepertoire']}");
                                        $i = 1;
                                        foreach ($repertoire as $repertoireitem) {
                                            echo $repertoireitem['name'];
                                            if($repertoire->rowCount() != $i) {
                                                echo ", ";
                                            };
                                            $i++;
                                        } ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <a href="add_order.php?timetable=<?= $row['id'] ?>&date=<?= $row['date'] ?>&time=<?= $row['time']; ?>&name=<?= $row['name']; ?>#comments"
                               class="btn btn-danger float-lg-right mb-3 mt-2 mr-2">
                                Забронировать
                            </a>
                            <?php
                        }
                    }
                    $db = null;
                    ?>
                </div>

            </div>
        </div>

    </div>
    <?php require_once "footer.php"; ?>
</div>
</div>
</body>
</html>