<?php

session_start();

include_once "connection.php";

if(isset($_POST["btnLogin"])) {

    $txtId = $_POST["txtId"];
    $txtPasswprd = $_POST["txtPasswprd"];

    if(!empty(trim($txtId)) && !empty(trim($txtPasswprd))) {
        $sql = "select * from employee where id = ? and password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$txtId, $txtPasswprd]);

        if($stmt->rowCount() > 0) {
            $_SESSION["infoAccount"] = $txtId;
            header("location: show.php");
        } else {
            header("location: login.php");
        }
    }
    header("location: login.php");
}


if(isset($_POST["btnUpdate"])) {

    $txtId = $_POST["txtId"];
    $txtEmpName = $_POST["txtEmpName"];
    $txtAge = $_POST["txtAge"];

    if(!empty(trim($txtId)) && !empty(trim($txtEmpName)) && !empty(trim($txtAge))) {
        $sql = "update employee set empname = ?, age = ? where id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$txtEmpName, $txtAge, $txtId]);
        header("location: show.php");
    } else {
        header("location: show.php");
    }
    header("location: show.php");
}