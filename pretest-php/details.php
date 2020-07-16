<?php

include_once 'connection.php';

if (isset($_GET['id'])) {
    $sql = 'select * from tbbook where isbn = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_GET['id']]);
    $row = $stmt->fetch();
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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Title</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <th>ISBN:</th>
                        <td><label><?= $row['ISBN'] ?><label></td>
                    </tr>
                    <tr>
                        <th>Title:</th>
                        <td><label><?= $row['Title'] ?><label></td>
                    </tr>
                    <tr>
                        <th>Author:</th>
                        <td><label><?= $row['Author'] ?><label></td>
                    </tr>
                    <tr>
                        <th>Edition:</th>
                        <td><label><?= $row['Edition'] ?><label></td>
                    </tr>
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