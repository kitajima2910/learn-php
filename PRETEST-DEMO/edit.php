<?php

include_once "connection.php";

if (!empty($_GET["id"])) {
    $sql = "select * from movie where id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_GET["id"]]);
    $row = $stmt->fetch();
} else {
    header("location: index.php");
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
        <div class="row">
            <div class="col-md-12">
                <form action="process.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="txtId" value="<?= $_GET["id"]; ?>">
                    <input type="hidden" name="txtFileOld" value="<?= $row["image"]; ?>">
                    <div class="md-form">
                        <input type="text" id="txtName" name="txtName" required value="<?= $row["name"]; ?>" class="form-control">
                        <label for="txtName">Enter name</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="txtCategory" name="txtCategory" required value="<?= $row["category"]; ?>" class="form-control">
                        <label for="txtCategory">Enter category</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="txtPrice" name="txtPrice" required value="<?= $row["price"]; ?>" class="form-control">
                        <label for="txtPrice">Enter price</label>
                    </div>
                    <div class="md-form">
                        <input type="file" id="txtFile" name="txtFile" accept="image/*" required class="form-control">
                    </div>
                    <div class="md-form">
                        <img src="images/<?= $row["image"]; ?>" class="img-fluid" width="100">
                    </div>
                    <button type="submit" name="btnEdit" class="btn btn-info">Edit</button>
                    <a href="index.php" class="btn btn-danger">Back</a>
                </form>
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