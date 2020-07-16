<?php
session_start();
include_once "connection.php";

$REGEX_EMAIL = "/^[\w]{2,}@[\w]{2,}(\.[\w]{2,}){1,2}$/";

if (isset($_POST["btnCreate"])) {

    $txtStudentID = $_POST["txtStudentID"];
    $txtStudentName = $_POST["txtStudentName"];
    $txtAddress = $_POST["txtAddress"];
    $txtEmail = $_POST["txtEmail"];

    if (!empty(trim($txtStudentID)) && !empty(trim($txtStudentName)) && !empty(trim($txtAddress)) && !empty(trim($txtEmail)) && preg_match($REGEX_EMAIL, $txtEmail)) {

        $sql = "select * from student where studentId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$txtStudentID]);

        if ($stmt->rowCount() == 0) {
            $sql = "insert into student(studentId, studentName, address, email) values(?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$txtStudentID, $txtStudentName, $txtAddress, $txtEmail]);
            header("location: index.php");
        } else {
            $_SESSION["msgError"] = "Trùng khoá chính...";
            header("location: createnew.php");
        }
    }
    header("location: index.php");
}

if (isset($_POST["btnEdit"])) {
    $txtStudentID = $_POST["txtStudentID"];
    $txtStudentName = $_POST["txtStudentName"];
    $txtAddress = $_POST["txtAddress"];
    $txtEmail = $_POST["txtEmail"];

    if (!empty(trim($txtStudentID)) && !empty(trim($txtStudentName)) && !empty(trim($txtAddress)) && !empty(trim($txtEmail)) && preg_match($REGEX_EMAIL, $txtEmail)) {

        $sql = "update student set studentName = ?, address = ?, email = ? where studentId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$txtStudentName, $txtAddress, $txtEmail, $txtStudentID]);
        header("location: index.php");
    }
    header("location: index.php");
}
