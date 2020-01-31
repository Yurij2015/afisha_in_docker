<?php
require_once "DbConnect.php";
require_once "dbsettings.php";
$authorname = trim(htmlspecialchars($_POST['authorname']));
$content = trim(htmlspecialchars($_POST['content']));

if (!empty($authorname) && !empty($content)) {
    try {
        $db = new DbConnect($host, $user, $db, $pass);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
    $timetable = $db->connect()->query("INSERT INTO comments (`authorname`, `content`) VALUES ('{$authorname}','{$content}')");
    $db = null;
    header('location: comments.php?msg=Отзыв добавлен.');
} else {
    echo 'Empty';
}

