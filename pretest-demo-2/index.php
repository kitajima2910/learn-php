<?php

session_start();

include_once "connection.php";

$sql = "select * from student order by studentId desc";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <title>Home</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3 mb-3">
                <a name="" id="" class="btn btn-primary" href="./createnew.php" role="button">Create new Student</a>
            </div>
            <div class="col-md-12">
                <?php 
                    if(isset($_SESSION["msgError"])):
                ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <?= $_SESSION["msgError"]; ?>
                        </div>
                <?php
                    unset($_SESSION["msgError"]);
                    endif;
                ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">StudentId</th>
                            <th scope="col">StudentName</th>
                            <th scope="col">Address</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aaction</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rows as $row) :
                        ?>
                            <tr>
                                <td><?= $row["studentId"]; ?></td>
                                <td><?= $row["studentName"]; ?></td>
                                <td><?= $row["address"]; ?></td>
                                <td><?= $row["email"]; ?></td>
                                <td>
                                    <a name="" id="" class="btn btn-warning" href="edit.php?id=<?= $row["studentId"]; ?>" role="button">Edit</a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>