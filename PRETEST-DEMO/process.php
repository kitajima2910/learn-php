<?php

include_once "connection.php";

$REGEX_PRICE = "/^[0-9]{1,}$/";
$REGEX_IMAGE = "/^image\/(jpg|jpeg|png|gif)$/";

if (isset($_POST["btnAdd"])) {

    $txtName = $_POST["txtName"];
    $txtCategory = $_POST["txtCategory"];
    $txtPrice = $_POST["txtPrice"];
    $txtFile = $_FILES["txtFile"];

    if (!empty(trim($txtName)) && !empty(trim($txtCategory)) && preg_match($REGEX_PRICE, $txtPrice) && !empty($txtFile)) {

        $type = $txtFile["type"];
        $size = $txtFile["size"];
        $name = $txtFile["name"];

        if (preg_match($REGEX_IMAGE, $type)) {

            if ($size <= 5024000) {
                $randName = md5(rand(111,999) . rand(111,999)) .$name;
                move_uploaded_file($txtFile["tmp_name"], "images/" . $randName);
                $sql = "insert into movie(name, category, price, image) values(?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$txtName, $txtCategory, $txtPrice, $randName]);
            }
        }

        header("location: index.php");
    } else {
        header("location: index.php");
    }
}


if (isset($_GET["action"]) && $_GET["action"] == "btnDelete") {

    if (!empty($_GET["id"])) {
        $sql = "select * from movie where id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_GET["id"]]);
        $row = $stmt->fetch();
        unlink("images/" . $row["image"]);

        $sql = "delete from movie where id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_GET["id"]]);



        header("location: index.php");
    } else {
        header("location: index.php");
    }
}


if (isset($_POST["btnEdit"])) {

    $txtName = $_POST["txtName"];
    $txtCategory = $_POST["txtCategory"];
    $txtPrice = $_POST["txtPrice"];
    $txtId = $_POST["txtId"];
    $txtFile = $_FILES["txtFile"];
    $txtFileOld = $_POST["txtFileOld"];

    if (!empty(trim($txtName)) && !empty(trim($txtCategory)) && preg_match($REGEX_PRICE, $txtPrice) && !empty($txtFile)) {

        $type = $txtFile["type"];
        $size = $txtFile["size"];
        $name = $txtFile["name"];

        if (preg_match($REGEX_IMAGE, $type)) {
            echo "a";
            if ($size <= 5024000) {
                $randName = md5(rand(111,999) . rand(111,999)) .$name;
                unlink("images/" . $txtFileOld);
                move_uploaded_file($txtFile["tmp_name"], "images/" . $randName);
                $sql = "update movie set name = ?, category = ?, price = ?, image = ? where id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$txtName, $txtCategory, $txtPrice, $randName, $txtId]);
            }
        }



        header("location: index.php");
    } else {
        header("location: index.php");
    }
}
