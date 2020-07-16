<?php

include_once 'connection.php';

$sql = "select * from employees order by id desc";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll();

echo json_encode($rows);