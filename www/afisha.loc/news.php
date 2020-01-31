<?php
$title = "Новости";
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
                </form>            </div>
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
                <div class="content" id="news">
                    <?php
                    $artists = $db->connect()->query("SELECT * FROM news ORDER BY idnews DESC ");
                    if ($artists) {
                        foreach ($artists as $row) {
                            ?>
                            <div class="row col-md-12 mb-3 mt-3">
                                <div class="col-md-12" id="info">
                                    <img src="/admin/<?= $row['linkimg']; ?>" width="300px"
                                         class="float-left mr-3">
                                    <p class="text-justify mb-0"><span
                                                class="font-weight-bold"> <?= $row['name']; ?></span></p>
                                    <p class="text-justify"><span
                                                class="font-weight-bold"></span><?= $row['description']; ?>
                                    </p>
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