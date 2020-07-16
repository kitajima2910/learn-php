<?php
include_once 'connection.php';

if(isset($_POST['btnSearch'])) {
    $search = $_POST['search'];
    $sql = 'select * from Customer where CustomerID like ? or CustomerName like ? or Address like ? or Email like ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['%' . $search . '%', '%' . $search . '%', '%' . $search . '%', '%' . $search . '%']);
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
    <!-- <link rel="stylesheet" href="assets/css/style.css">
<title>Title</title> -->
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>CustomerID</th>
                            <th>CustomerName</th>
                            <th>Address</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rows as $row) {
                        ?>
                            <tr>
                                <td><?= $row['CustomerID']; ?></td>
                                <td><?= $row['CustomerName']; ?></td>
                                <td><?= $row['Address']; ?></td>
                                <td><?= $row['Email']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a class="btn btn-dark" href="index.php" role="button">BACK</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>

</html>