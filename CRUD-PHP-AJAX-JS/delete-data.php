<?php

include_once 'connection.php';

$sql = "delete from employees where id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$_POST["id"]]);

echo "Done";