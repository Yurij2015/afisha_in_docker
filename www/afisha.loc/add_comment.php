<?php
$title = "Добавить отзыв";
require_once "public_header.php";
?>
<div class="container">
    <div class="row afisha">
        <div class="starthead bg-dark">
            <h1 class="starthead-center">Афиша</h1>
        </div>
        <div class="row contentafisha">
            <div class="calendar contentafisha-center"><i class="fa fa-calendar"></i>
                Календарь
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
                <div class="content" id="comments">
                    <div class="row col-md-12 mb-3 mt-3">
                        <div class="col-md-12">
                            <form method="post" id="artistForm"
                                  action="add_comment_handler.php">
                                <div class="form-group">
                                    <label for="authorname" class="float-left">Ваше имя</label>
                                    <input type="text" class="form-control" name="authorname" id="authorname" required>
                                </div>
                                <div class="form-group">
                                    <label for="content" class="float-left">Отзыв</label>
                                    <textarea class="form-control" name="content" id="content"
                                              required></textarea>
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
    <footer class="row">
        <div class="col-md-12">
            <?= "Все права защищены " . "&copy; " . date("Y") ?>
        </div>
    </footer>
</div>
</div>
</body>
</html>