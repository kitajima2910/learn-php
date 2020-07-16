<?php
session_start();
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
                <?php
                if(isset($_SESSION['error'])) {
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <?= $_SESSION['error']; ?>
                </div>
                <?php
                }
                ?>
                <form action="process.php" method="post">
                    <div class="form-group">
                        <label>CustomerID</label>
                        <input type="text" name="id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>CustomerName</label>
                        <input type="text" name="name" minlength="2" maxlength="30" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" minlength="2" maxlength="30" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required pattern="^[\w]{2,}@[\w]{2,}(\.[\w]{2,}){1,2}$">
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnAdd">INSERT</button>
                    <a class="btn btn-dark" href="index.php" role="button">BACK</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>

</html>
