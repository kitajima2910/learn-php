<?php

session_start();

include_once 'connection.php';

if (isset($_POST['btnAdd'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $sql = 'select * from Customer where CustomerID = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() == 0) {
        $sql = 'insert into Customer(CustomerID, CustomerName, Address, Email) values(?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id, $name, $address, $email]);
        header('location: index.php');
    } else {
        $_SESSION['error'] = 'Check CustomerID đã tồn tại...';
        header('location: add.php');
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'btnDelete') {

    $id = $_GET['id'];

    $sql = 'delete from Customer where CustomerID = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    header('location: index.php');
}

if (isset($_POST['btnUpdate'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $sql = 'update Customer set CustomerName = ?, Address = ?, Email = ? where  CustomerID = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $address, $email, $id]);
    header('location: index.php');
}
