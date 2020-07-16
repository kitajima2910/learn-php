<?php

include_once "connection.php";

if (!isset($_REQUEST["id"])) {
    header("location: index.php");
}

$sql = "select * from tbl_file where id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$_REQUEST["id"]]);
$row = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add</title>
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
                    <input type="hidden" name="txtId" value="<?= $row["id"]; ?>">
                    <input type="hidden" name="txtFileOld" value="<?= $row["image"]; ?>">
                    <div class="md-form">
                        <input type="text" id="txtName" name="txtName" value="<?= $row["name"]; ?>" required class="form-control">
                        <label for="txtName">Enter name</label>
                    </div>
                    <div class="md-form">
                        <input type="file" id="txtFile" name="txtFile" required accept="image/*" class="form-control">
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="images/<?= $row["image"]; ?>" class="card-img-top">
                    </div>
                    <button type="submit" name="btnEdit" id="btnEdit" class="btn btn-primary">Update</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
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