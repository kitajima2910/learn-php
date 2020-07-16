<?php

$conn = mysqli_connect("localhost", "root", "", "lapshop") or die("Cannot conenct");
// $conn = new mysqli("localhost", "root", "", "lapshop");
$sql = "select * from laptop";
$stmt = mysqli_query($conn, $sql);
$rows = $stmt->fetch_all();

mysqli_free_result($stmt);
mysqli_close($conn);

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
    <title>LAPTOP SHOP ONLINE | HOME</title>
</head>

<body>

    <?php include "./header.html"; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a name="" id="" class="btn btn-primary d-inlide-block mb-3" href="./insert.php" role="button">Add Laptop</a>
                <a name="" id="" class="btn btn-primary d-inlide-block mb-3" href="./search.php" role="button">Search Laptop</a>
                <table class="table table-striped table-inverse">
                    <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rows as $row) :
                        ?>
                            <tr>
                                <td><?= $row[0]; ?></td>
                                <td><?= $row[1]; ?></td>
                                <td><?= $row[2]; ?></td>
                                <td><?= $row[3]; ?></td>
                                <td>
                                    <a class="btn btn-danger" href="delete.php?code=<?= $row[0]; ?>" role="button">Delete</a>
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="update.php?code=<?= $row[0]; ?>" role="button">Update</a>
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