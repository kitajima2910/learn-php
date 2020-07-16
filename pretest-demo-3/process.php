<?php

$conn = mysqli_connect("localhost", "root", "", "lapshop") or die("Cannot conenct");

if(isset($_POST["btnUpdate"])) {

    $code = $_POST["code"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $supplier = $_POST["supplier"];

    $sql = "update laptop set lapName = ?, price = ?, supplier = ? where lapId = ?";
    $stmt =  mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $price, $supplier, $code);

    if (mysqli_stmt_execute($stmt)) {
        echo "insert successfully";
        header("location: index.php");
    } else {
        echo "insert faill!!!";
    }

}

mysqli_close($conn);

?>