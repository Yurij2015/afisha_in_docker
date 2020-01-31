<?php $title = "Комментарии" ?>
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
                require_once "Comments.php";

                try {
                    $db = new DbConnect($host, $user, $db, $pass);
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }
                ?>
                <table class="table table-hover table-bordered">
                    <tbody>
                    <tr>
                        <th>Автор</th>
                        <th>Содержание отзыва</th>
                        <th></th>
                    </tr>
                    <?php
                    $comments = $db->connect()->query("SELECT * FROM comments ORDER BY idcomment DESC ");
                    if ($comments) {
                        foreach ($comments as $row) {
                            $comments = new Comments($row['authorname'], $row['content']);
                            ?>
                            <tr>
                                <td><?= $comments->authorname(); ?></td>
                                <td><?= $comments->content(); ?></td>
                                <td><?= '<a href="delete_comment.php?idcomment=' . $row['idcomment'] . '" class="small">Удалить</a>' ?></td>
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

