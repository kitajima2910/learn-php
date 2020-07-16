<?php

session_start();
include_once 'connection.php';

$REGEX_EMAIL = '/^[\w]{2,}@[\w]{2,}(\.[\w]{2,}){1,2}$/';

if (isset($_POST['btnAdd'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    if (!empty(trim($id)) && !empty(trim($name)) && !empty(trim($address)) && !empty(trim($email))) {
        if ((strlen($name) >= 2 && strlen($name) <= 30) && (strlen($address) >= 2 && strlen($address) <= 30)) {
            if (preg_match($REGEX_EMAIL, $email)) {
                $sql = 'INSERT INTO `customer`(`CustomerID`, `CustomerName`, `Address`, `Email`) VALUES (?, ?, ?, ?)';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id, $name, $address, $email]);

                header('location: index.php');
            } else {
                $_SESSION['error'] = 'Check fileds....';
                header('location: add.php');
            }
        }
    }
    
}
