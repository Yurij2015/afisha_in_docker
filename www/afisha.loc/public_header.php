<?php
session_start();
require_once "DbConnect.php";
require_once "dbsettings.php";
require_once 'Session.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title><?= $title ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="/#content">
            <img src="/admin/images/turandot-140x80.png" alt="Logo" style="width:140px;">
        </a>
        <ul class="navbar-nav mr-auto">
            <!-- Dropdown -->
            <li class="nav-item dropdown ml-5 pr-5">
                <a class="nav-link dropdown-toggle" href="/" id="navbardrop" data-toggle="dropdown">
                    Афиша
                </a>
                <div class="dropdown-menu">
                    <?php
                    try {
                        $db = new DbConnect($host, $user, $db, $pass);
                    } catch (PDOException $exc) {
                        echo $exc->getMessage();
                    }
                    $cultural_institution = $db->connect()->query("SELECT * FROM  cultural_institution");
                    foreach ($cultural_institution as $cultural_institution_item) {
                        ?>
                        <a class="dropdown-item"
                           href="/information_dropdown.php?cultural_institution=<?php echo $cultural_institution_item['id_cultural_institution'] ?>#info"><?php echo $cultural_institution_item['ci_name'] ?></a>
                    <?php } ?>
                    <a class="dropdown-item" href="/information_dropdown.php?cultural_institution=all">Все театры</a>
                </div>
            </li>

            <li class=" nav-item">
                    <a class="nav-link ml-5 pr-5" href="/news.php#news">Новости</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-5 pr-5" href="/artists.php#artists">Артисты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-5 pr-5" href="/comments.php#comments">Отзывы</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <?php if (Session::has('email')) : ?>
                <li class="nav-item">

                    <a class="nav-link authcolor small" href="/auth/logout.php"><i class="fas fa-user"></i>Выйти
                        (<?= Session::get('email'); ?>)</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link authcolor small" href="/auth/auth.php#auth"><i class="fas fa-user"></i>
                        Авторизация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link authcolor small" href="/auth/reg.php#reg">Регистрация</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <div id="demo" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/admin/images/la.jpg" alt="Спектакль 1" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="/admin/images/chicago.jpg" alt="Спектакль 2" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="/admin/images/ny.jpg" alt="Спектакль 3" width="1100" height="500">
            </div>
        </div>
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>