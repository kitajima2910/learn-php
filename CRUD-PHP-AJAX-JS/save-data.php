<?php

include_once 'connection.php';

$REGEX_EMAIL = "/^[\w]{2,}@[\w]{2,}(\.[\w]{2,}){1,2}$/";

if (isset($_POST["btnAdd"])) {

    $txtFullName = $_POST["txtFullName"];
    $txtEmail = $_POST["txtEmail"];
    $txtAddress = $_POST["txtAddress"];

    if (!empty(trim($txtFullName)) && !empty(trim($txtEmail)) && preg_match($REGEX_EMAIL, $txtEmail)) {
        $sql = "insert into employees(full_name, email, address) values(?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$txtFullName, $txtEmail, $txtAddress]);

        echo 'Done';
    }
}

