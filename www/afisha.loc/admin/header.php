<?php
session_start();
require_once '../../../Session.php';
if (!Session::has('email')) {
//    echo 'У вас нет доступа к админ-панели!';
    header('Location: /index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/../bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <script src="/../js/script.js"></script>
    <!--    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>-->
    <!--    <script>tinymce.init({selector:'textarea'});</script>-->
    <title><?= $title ?></title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/admin/pages/artists/artists.php">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/pages/timetable/timetable_view.php">Афиша</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/pages/news/news_view.php">Новости</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/pages/artists/artists.php">Артисты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/pages/repertoire/repertoire_view.php">Репертуар</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/pages/booking/booking_view.php">Забронированные билеты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/pages/comments/comments_view.php">Комментарии</a>
            </li>
        </ul>
        <a class="btn btn-primary mr-5" href="/../auth/logout.php" role="button">Выйти (<?= Session::get('email'); ?>
            )</a>
    </nav>