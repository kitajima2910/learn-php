<?php

include_once "connection.php";

$sql = "select * from tbl_file where id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$_GET["id"]]);
$row = $stmt->fetch();

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
    <title>Edit</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="process.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="txtId" value="<?= $row["id"]; ?>">
                    <input type="hidden" name="txtOldFile" value="<?= $row["image"]; ?>">
                    <div class="form-group">
                        <label for="txtName" class="col-sm-1-12 col-form-label">Name</label>
                        <input type="text" required class="form-control" name="txtName" id="txtName" placeholder="Enter name" value="<?= $row["name"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txtFile" class="col-sm-1-12 col-form-label">File</label>
                        <input type="file" required class="form-control-file" name="txtFile" id="txtFile" accept="image/*">
                    </div>
                    <div class="card mb-3" style="width: 18rem;">
                        <img src="images/<?= $row["image"]; ?>" class="card-img-top" alt="...">
                    </div>
                    <button type="submit" name="btnEdit" id="btnEdit" class="btn btn-success">Update</button>
                    <a class="btn btn-danger" href="index.php" role="button">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>