<?php

include_once 'connection.php';

$sql = 'select * from Customer where CustomerID = ?';
$stmt = $conn->prepare($sql);
$stmt->execute([$_GET['id']]);
$row = $stmt->fetch();

echo 'DETAILE ' . $_GET['id'] . ':' . '<br>';

echo 'CustomerID: ' . $_GET['id'] . '<br>';
echo 'CustomerName: ' . $row['CustomerName'] . '<br>';
echo 'Address: ' . $row['Address'] . '<br>';
echo 'Email: ' . $row['Email'] . '<br>';

?>

<a href="index.php">BACK</a>