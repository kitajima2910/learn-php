<?php

include_once 'connection.php';
$sql = 'select * from Customer where CustomerID = ?';
$stmt = $conn->prepare($sql);
$stmt->execute([$_GET['id']]);
$row = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css">
    <title>Title</title> -->
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <th>CustomerID</th>
                        <td><?= $row['CustomerID']; ?></td>
                    </tr>
                    <tr>
                        <th>CustomerName</th>
                        <td><?= $row['CustomerName']; ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?= $row['Address']; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= $row['Email']; ?></td>
                    </tr>
                </table>
                <a class="btn btn-dark" href="index.php" role="button">BACK</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>

</html>