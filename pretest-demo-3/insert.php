<?php

$conn = mysqli_connect("localhost", "root", "", "lapshop") or die("Cannot conenct");

if (isset($_POST["submit"])) {
    $code = $_POST["code"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $supplier = $_POST["supplier"];

    $sql = "insert into laptop values(?, ?, ?, ?)";
    $stmt =  mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $code, $name, $price, $supplier);

    if (mysqli_stmt_execute($stmt)) {
        echo "insert successfully";
        header("location: index.php");
    } else {
        echo "insert faill!!!";
    }
}

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
    <title>LAPTOP SHOP ONLINE | INSERT</title>
</head>

<body>

    <?php include "./header.html"; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <form method="post">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="code" class="col-sm-1-12 col-form-label">Code</label>
                                <input type="text" class="form-control" name="code" id="code" placeholder="">
                            </div>
                            <div class="col-md-12">
                                <label for="name" class="col-sm-1-12 col-form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="">
                            </div>
                            <div class="col-md-12">
                                <label for="price" class="col-sm-1-12 col-form-label">Price</label>
                                <input type="text" class="form-control" name="price" id="price" placeholder="">
                            </div>
                            <div class="col-md-12">
                                <label for="supplier" class="col-sm-1-12 col-form-label">Supplier</label>
                                <input type="text" class="form-control" name="supplier" id="supplier" placeholder="">
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>