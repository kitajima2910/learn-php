<?php

include_once "connection.php";

$sql = "select * from movie order by id desc";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll();

if (isset($_GET["btnSearch"])) {

    if ($_GET["txtFromPrice"] <= $_GET["txtToPrice"]) {
        $sqlSearch = "select * from movie where price >= ? and price <= ?";
        $stmtSearch = $conn->prepare($sqlSearch);
        $stmtSearch->execute([$_GET["txtFromPrice"], $_GET["txtToPrice"]]);
        $rowSearch = $stmtSearch->fetchAll();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>

<body>

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">

                <a href="add.php" class="btn btn-info">Add Movie</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        if (!empty($rows)) {
                            foreach ($rows as $row) {
                        ?>
                                <tr>
                                    <td><?= ++$i; ?></td>
                                    <td><?= $row["name"]; ?></td>
                                    <td><?= $row["category"]; ?></td>
                                    <td>
                                        <img src="images/<?= $row["image"]; ?>" class="img-fluid" width="100">
                                    </td>
                                    <td><?= $row["price"]; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= $row["id"]; ?>" class="btn btn-warning">Edit</a>
                                        <a href="process.php?action=btnDelete&id=<?= $row["id"]; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6" class="text-center">NOT FOUND!!!</td>
                            </tr>
                        <?php

                        }
                        ?>
                    </tbody>
                </table>

            </div>


        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="col-md-12">
                    <h2 class="text-center">SEARCH MOVIE</h2>
                    <form action="" method="GET">
                        <div class="md-form">
                            <input type="text" id="txtFromPrice" name="txtFromPrice" required class="form-control">
                            <label for="txtFromPrice">From: Price</label>
                        </div>
                        <div class="md-form">
                            <input type="text" id="txtToPrice" name="txtToPrice" required class="form-control">
                            <label for="txtToPrice">To: Price</label>
                        </div>
                        <button type="submit" name="btnSearch" value="Search" class="btn btn-info">Search</button>
                    </form>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            if (!empty($rowSearch)) {
                                foreach ($rowSearch as $row) {
                            ?>
                                    <tr>
                                        <td><?= ++$i; ?></td>
                                        <td><?= $row["name"]; ?></td>
                                        <td><?= $row["category"]; ?></td>
                                        <td>
                                            <img src="images/<?= $row["image"]; ?>" class="img-fluid" width="100">
                                        </td>
                                        <td><?= $row["price"]; ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5" class="text-center">NOT FOUND!!!</td>
                                </tr>
                            <?php

                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- End your project here-->
    <!-- jQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript">
    </script>
</body>

</html>