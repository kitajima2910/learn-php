<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <!-- <title>Title</title> -->
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
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
                            unset($_SESSION['error']);
                        }
                    ?>
                    

                    <form action="process.php" method="post">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>ID:</label>
                                <input type="text" class="form-control" name="id" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Name:</label>
                                <input type="text" class="form-control" minlength="2" maxlength="30" name="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Address:</label>
                                <input type="text" class="form-control" minlength="2" maxlength="30" name="address" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Email:</label>
                                <input type="email" class="form-control" name="email" required pattern="^[\w]{2,}@[\w]{2,}(.[\w]{2,}){1,2}$">
                            </div>
                        </div>
                        <button type="submit" name="btnAdd" class="btn btn-primary">INSERT</button>
                        <a class="btn btn-dark" href="index.php" role="button">BACK</a>
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