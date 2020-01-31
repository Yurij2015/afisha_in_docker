<?php
$title = "Поиск";
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
                    $search = $_POST['search'];
                    //                    $timetable = $db->connect()->query("SELECT DISTINCT idartist, repertoire.name AS reportoirename,repertoire.author,repertoire.description AS repertoiredescription,linkimg, agelimitation, artists.name AS artistname,artists.description AS artistdescription FROM repertoire,repertoire_has_artist,artists WHERE repertoire.name LIKE '%$search%' OR repertoire.idrepertoire = (SELECT repertoire_idrepertoire FROM repertoire_has_artist WHERE artist_idartist = (SELECT idartist FROM artists WHERE artists.name LIKE '%$search%') AND repertoire_has_artist.repertoire_idrepertoire = repertoire.idrepertoire AND repertoire_has_artist.artist_idartist = artists.idartist) AND repertoire_has_artist.repertoire_idrepertoire = repertoire.idrepertoire AND repertoire_has_artist.artist_idartist = artists.idartist");
                    $timetable = $db->connect()->query("SELECT id, date, time, idartist, repertoire.name AS reportoirename,repertoire.author,repertoire.description AS repertoiredescription,linkimg, agelimitation, a.name AS artistname,a.description AS artistdescription FROM timetable JOIN repertoire ON timetable.repertoire_idrepertoire = repertoire.idrepertoire JOIN repertoire_has_artist rha on repertoire.idrepertoire = rha.repertoire_idrepertoire JOIN artists a on rha.artist_idartist = a.idartist WHERE repertoire.name LIKE '%$search%' OR a.name LIKE '%$search%' ");
                    if ($timetable) {
                        foreach ($timetable as $row) {
                            ?>
                            <div class="row col-md-12 mb-5 mt-5">
                                <div class="col-md-12" id="info">
                                    <img src="/admin/<?= $row['linkimg']; ?>" width="300px"
                                         class="float-left mr-3">
                                    <p class="text-justify mb-0">
                                        <span class="font-weight-bold">Название спектакля:</span>
                                        <?= $row['reportoirename']; ?>
                                    </p>
                                    <p class="text-justify mb-0">
                                        <span class="font-weight-bold">Ограничение по возрасту:</span>
                                        <?= $row['agelimitation']; ?>
                                    </p>
                                    <p class="text-justify mb-0">
                                        <span class="font-weight-bold">Автор:</span>
                                        <?= $row['author']; ?></p>
                                    <p class="text-justify  mb-0">
                                        <span class="font-weight-bold ">Описание: </span>
                                        <?= $row['repertoiredescription']; ?>
                                    </p>
                                    <p class="text-justify  mb-0">
                                        <span class="font-weight-bold">Дата: </span>
                                        <?= $row['date'] . " " . $row['time']; ?>
                                    </p>
                                    <p class="text-justify mb-0">
                                        <span class="font-weight-bold">Артист:</span>
                                        <?= $row['artistname']; ?></p>
                                    <p class="text-justify mb-0">
                                        <span class="font-weight-bold">Об артисте:</span>
                                        <?= $row['artistdescription']; ?>
                                    </p>
                                    <a href="information.php?id=<?= $row['id']; ?>#info"
                                       class="btn btn-danger float-right">Информация</a>
                                </div>
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