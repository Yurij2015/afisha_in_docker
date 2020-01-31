<?php
$title = "Мои заказы";
require_once "public_header.php";
?>
<div class="container">
    <div class="row afisha">
        <div class="starthead bg-dark">
            <h1 class="starthead-center">Личный кабинет. Мои заказы</h1>
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
                <div class="content" id="content">
                    <?php
                    $user = Session::get('email');
                    $booking = $db->connect()->query("SELECT * FROM booking JOIN timetable t on booking.timetable_id = t.id JOIN repertoire r on t.repertoire_idrepertoire = r.idrepertoire JOIN cultural_institution ON r.cultural_institution = cultural_institution.id_cultural_institution  WHERE booking.user = \"$user\" ORDER BY idbook DESC ");
                    if ($booking) {
                        foreach ($booking as $row) {
                            ?>
                            <div class="col-md-12 mb-5 mt-5" id="info">
                                <img src="/admin/<?= $row['linkimg']; ?>" width="270px"
                                     class="float-left mr-3" alt="<?= $row['name']; ?>">
                                <p class="text-justify mb-0"><span
                                            class="font-weight-bold">Название театра:</span> <?= $row['ci_name']; ?></p>
                                <p class="text-justify mb-0"><span
                                            class="font-weight-bold"> Дата:</span> <?= $row['date'] . "&nbsp;" . $row['time']; ?>
                                </p>
                                <p class="text-justify mb-0"><span
                                            class="font-weight-bold">Название:</span> <?= $row['name']; ?>
                                </p>
                                <p class="text-justify mb-0">
                                    <span class="font-weight-bold">Ряд: </span> <?= $row['row']; ?>
                                    <span class="font-weight-bold">Место: </span> <?= $row['place']; ?>
                                </p>
                                <?php
                                if ($row['row'] <= 5) {
                                    ?>
                                    <p class="text-justify mb-0"><span
                                                class="font-weight-bold">Стоимость:</span> <?= ($row['cost'] * 0.3) + $row['cost']; ?>
                                    </p>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($row['row'] > 5) {
                                    ?>
                                    <p class="text-justify mb-0"><span
                                                class="font-weight-bold">Стоимость:</span> <?= $row['cost']; ?>
                                    </p>
                                    <?php
                                }
                                ?>

                                <p class="text-justify mb-0"><span
                                            class="font-weight-bold">Ограничение по возрасту:</span> <?= $row['agelimitation']; ?>
                                </p>
                                <p class="text-justify mb-1"><span
                                            class="font-weight-bold">Автор:</span> <?= $row['author']; ?>
                                </p>
                                <p class="text-justify mb-1"><span
                                            class="font-weight-bold">Заказ оформлен:</span> <?= $row['timestamp']; ?>
                                </p>
                            </div>
                            <hr>
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