<?php

include_once "connection.php";

session_start();

if(!isset( $_SESSION["infoAccount"])) {
    header("location: login.php");
}

$sql = "select * from employee order by id desc";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll();

$role = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>EmpName</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 0;
                if(!empty($rows)) {
                    foreach($rows as $row) {
            ?>
                <tr>
                    <td><?= ++$i; ?></td>
                    <td><?= $row["empname"]; ?></td>
                    <td><?= $row["age"]; ?></td>
                    <td>
                        <?php 
                            if($role != 1) {
                        ?>
                            <a href="javascript:void(0)">Disable update</a>
                        <?php
                            } else {
                        ?>
                                <a href="update.php?id=<?= $row["id"]; ?>">update</a>
                        <?php
                            }
                        ?>
                        
                    </td>
                </tr>
            <?php
                    }
                } else {
            ?>
                <tr>
                    <td colspan="4">NOT FOUND!</td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

</body>
</html>