<?php
require_once "../../../DbConnect.php";
require_once "../../../dbsettings.php";
$name = trim(htmlspecialchars($_POST['name']));
$description = trim(htmlspecialchars($_POST['description']));
if (!empty($name) && !empty($description)) {
    try {
        $db = new DbConnect($host, $user, $db, $pass);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
    $target_file_for_db = "uploads/news/" . basename($_FILES["fileToUpload"]["name"]);
    $target_dir = "../../uploads/news/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (isset($_POST["fileToUpload"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $uploadOk = 0;
        header('location: news_view.php?msg=Sorry, your file is too large.');
    }
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], iconv('utf-8', 'windows-1251', $target_file))) {
            $fileuploaded = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            $artists = $db->connect()->query("INSERT INTO news (`name`, `description`, `linkimg`) VALUES ('{$name}','{$description}', '{$target_file_for_db}')");
            header(('location: news_view.php?msg=') . $fileuploaded);
        } else {
            header('location: news_view.php?msg=Sorry, there was an error uploading your file.');
        }
    }
//    $artists = $db->connect()->query("INSERT INTO news (`name`, `description`, `linkimg`) VALUES ('{$name}','{$description}', '{$target_file}')");
    $db = null;
} else {
    echo 'Empty';
}

