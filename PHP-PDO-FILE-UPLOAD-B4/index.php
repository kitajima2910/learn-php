<?php

session_start();

include_once "connection.php";

$sql = "select * from tbl_file order by id desc";
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
            <div class="col-md-12">
                <a class="btn btn-primary mt-3 mb-3" href="add.php" role="button">Add Image</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            if (!empty($rows)) :
                                foreach ($rows as $row) :
                        ?>
                                <tr>
                                    <td><?= ++$i; ?></td>
                                    <td><?= $row["name"]; ?></td>
                                    <td>
                                        <img src="images/<?= $row["image"] ?>" class="img-fluid" alt="<?= $row["name"]; ?>" width="100">
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="edit.php?id=<?= $row["id"]; ?>" role="button">
                                            <i class="fa fa-book" aria-hidden="true"></i>
                                        </a>
                                        <a class="btn btn-danger" href="process.php?action=btnDelete&id=<?= $row["id"]; ?>" role="button">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                                endforeach;
                            else :
                        ?>
                                <tr>
                                    <td colspan="4" class="text-center">NOT FOUND</td>
                                </tr>
                        <?php
                            endif;
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