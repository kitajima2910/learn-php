<?php

include_once 'connection.php';

if (isset($_POST['btnSearch'])) {
    $search = $_POST['search'];
    $sql = 'select * from tbbook where title like ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['%' . $search . '%']);
    $rows = $stmt->fetchAll();
}



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
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <!-- <title>Title</title> -->
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ISBN</th>
                            <th>TItle</th>
                            <th>Author</th>
                            <th>Edition</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($rows as $row) {
                        ?>
                            <tr>
                                <td><?= $row['ISBN']; ?></td>
                                <td><?= $row['Title']; ?></td>
                                <td><?= $row['Author']; ?></td>
                                <td><?= $row['Edition']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <a href="index.php" role="button">Back</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>

</html>