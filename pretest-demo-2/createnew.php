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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <title>Create New</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    if(isset($_SESSION["msg"])) {
                        echo $_SESSION["msg"];
                        unset($_SESSION["msg"]);
                    }
                ?>
                <form action="process.php" method="post">
                    <div class="container">
                        <form>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="txtStudentID" class="col-sm-1-12 col-form-label">StudentID</label>
                                    <input type="text" class="form-control" name="txtStudentID" id="txtStudentID" required placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="txtStudentName" class="col-sm-1-12 col-form-label">StudentName</label>
                                    <input type="text" class="form-control" name="txtStudentName" id="txtStudentName" required placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="txtAddress" class="col-sm-1-12 col-form-label">Address</label>
                                    <input type="text" class="form-control" name="txtAddress" id="txtAddress" required placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="txtEmail" class="col-sm-1-12 col-form-label">Email</label>
                                    <input type="text" class="form-control" name="txtEmail" id="txtEmail" placeholder="" required pattern="^[\w]{2,}@[\w]{2,}(\.[\w]{2,}){1,2}$">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="btnCreate">CREATE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>