<?php 

include_once 'connection.php';
$sql = 'select * from Customer order by CustomerID desc';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css">
    <title>Title</title> -->
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="add.php" role="button">INSERT</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>CustomerID</th>
                            <th>CustomerName</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($rows as $row) {
                    ?>
                        <tr>
                            <td><?= $row['CustomerID']; ?></td>
                            <td><?= $row['CustomerName']; ?></td>
                            <td><?= $row['Address']; ?></td>
                            <td><?= $row['Email']; ?></td>
                            <td>
                                <a class="btn btn-primary" href="details.php?id=<?= $row['CustomerID'];  ?>" role="button">Details</a>
                                <a class="btn btn-success" href="update.php?id=<?= $row['CustomerID'];  ?>" role="button">Update</a>
                                <a class="btn btn-danger" href="process.php?action=btnDelete&id=<?= $row['CustomerID'];  ?>" role="button">Detale</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
                <form action="search.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="search">
                    </div>
                    <button type="submit" name="btnSearch" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>

</html>