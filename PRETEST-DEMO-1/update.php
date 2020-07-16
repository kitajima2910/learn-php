<?php
include_once "connection.php";

// if(!isset( $_SESSION["infoAccount"])) {
//     header("location: show.php");
// }

if(!isset($_GET["id"])) {
    header("location: show.php");
}


if(isset($_GET["id"])) {
    $sql = "select * from employee where id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_GET["id"]]);
    $row = $stmt->fetch();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Update Info <?=$_GET["id"]; ?></h2>
    <form action="process.php" method="post">
        <label for="txtId">ID:</label> <br>
        <input type="text" name="txtId" readonly value="<?= $row["id"]; ?>" id="txtId"> <br> <br>
        <label for="txtEmpName">EmpName:</label> <br>
        <input type="text" name="txtEmpName" required id="txtEmpName" value="<?= $row["empname"]; ?>"> <br> <br>
        <label for="txtAge">Age:</label> <br>
        <input type="number" name="txtAge" required min="1" max="100" id="txtAge" value="<?= $row["age"]; ?>"> <br> <br>
        <button type="submit" name="btnUpdate">Update</button>
    </form>
</body>
</html>