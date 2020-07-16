<?php

$conn = mysqli_connect("localhost", "root", "", "lapshop") or die("Cannot conenct");
$sql = "delete from laptop where lapId = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $_GET["code"]);

if(mysqli_stmt_execute($stmt)) {
    header("location: index.php");
} else {
    echo "delete fail";
}

mysqli_free_result($stmt);
mysqli_close($conn);

?>