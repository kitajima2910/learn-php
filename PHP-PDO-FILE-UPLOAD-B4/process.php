<?php

include_once "connection.php";

$REGEX_NAME = "/^[\s\w]{3,}$/";
$REGEX_IMAGE = "/^image\/(jpg|jpeg|png|gif)$/";

if (isset($_REQUEST["btnAdd"])) {
    $txtName = $_REQUEST["txtName"];
    $txtFile = $_FILES["txtFile"];

    if (!empty(trim($txtName)) && preg_match($REGEX_NAME, $txtName) && !empty($txtFile)) {
        $type = $txtFile["type"];
        $size = $txtFile["size"];

        if (preg_match($REGEX_IMAGE, $type)) {
            if ($size <= 5042000) {
                $randName = md5(rand(111, 999) . rand(111, 999)) . $txtFile["name"];
                move_uploaded_file($txtFile["tmp_name"], "images/$randName");
                $sql = "insert into tbl_file(name, image) values(?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$txtName, $randName]);
                header("location: index.php");
            }
        }
    }

    header("location: index.php");
}

if(isset($_REQUEST["btnEdit"])) {
    $txtName = $_REQUEST["txtName"];
    $txtId = $_REQUEST["txtId"];
    $txtOldFile = $_REQUEST["txtOldFile"];
    $txtFile = $_FILES["txtFile"];

    if(!empty(trim($txtName)) && preg_match($REGEX_NAME, $txtName) && !empty($txtFile)) {
        $type = $txtFile["type"];
        $size = $txtFile["size"];
        if(preg_match($REGEX_IMAGE, $type)) {
            if($size <= 5024000) {
                $randName = md5(rand(111,999) . rand(111,999)) . $txtFile["name"];
                unlink("images/$txtOldFile");
                move_uploaded_file($txtFile["tmp_name"], "images/$randName");
                $sql = "update tbl_file set name = ?, image = ? where id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$txtName, $randName, $txtId]);
                header("location: index.php");
            }
        }
    }

    header("location: index.php");
}

if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "btnDelete") {
    $id = $_REQUEST["id"];

    $sql = "select * from tbl_file where id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch();
    unlink("images/" . $row["image"]);

    $sql = "delete from tbl_file where id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    
    header("location: index.php");
}
