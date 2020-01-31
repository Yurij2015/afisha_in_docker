<?php $title = "Добавить спектакль в репертуар артиста" ?>
<?php
require_once "../../header.php";
require_once "../../../DbConnect.php";
require_once "../../../dbsettings.php";
$db = new DbConnect($host, $user, $db, $pass);
?>
<div class="row">
    <div class="col-md-12">
        <?= "<h2 class='mt-3'>" . $title . "</h2>";
        ?>
        <div class="row">
            <div class="col-md-12">
                <form method="post" id="artistForm" action="add_rep_of_art_handler.php">
                    <div class="form-group">
                        <label for="artist_idartist">Артист</label>
                        <select class="form-control" name="artist_idartist" id="artist_idartist">
                            <?php
                            $artist = $db->connect()->query("SELECT idartist, name FROM artists");
                            foreach ($artist as $artistitem) {
                                ?>
                                <option value="<?php echo $artistitem['idartist'] ?>"><?php echo $artistitem['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="repertoire_idrepertoire">Спектакль</label>
                        <select class="form-control" name="repertoire_idrepertoire" id="repertoire_idrepertoire">
                            <?php
                            $repertoire = $db->connect()->query("SELECT idrepertoire, name FROM repertoire");
                            foreach ($repertoire as $repertoireitem) {
                                ?>
                                <option value="<?php echo $repertoireitem['idrepertoire'] ?>"><?php echo $repertoireitem['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success" value="Сохранить">
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once "../../footer.php"; ?>

