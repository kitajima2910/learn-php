<?php

session_start();

include "connection.php";

if (isset($_POST["btnLogin"])) {

    // $txtUsername = $_REQUEST["txtUsername"];
    // $txtPassword = $_REQUEST["txtPassword"];

    if (empty(($_POST["txtUsername"])) || empty(($_POST["txtPassword"]))) {
        echo "<font color='red'>Username or Password required!!!</font>";
    } else {
        $sql = "select * from users where username = ? and password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST["txtUsername"], $_POST["txtPassword"]]);

        if ($stmt->rowCount() > 0) {
            $_SESSION["infoAccount"] = $_POST["txtUsername"];
            header("location: login_success.php");
        } else {
            echo "<font color='red'>Username or Password invalid!!!</font>";
            header("location: login.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DEMO SESSION LOGIN LOGOUT</title>
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
                <h2 class="mt-3 text-center">LOGIN FORM</h2>
                <form action="" method="post">
                    <div class="md-form">
                        <input type="text" id="txtUsername" name="txtUsername" class="form-control">
                        <label for="txtUsername">Enter username</label>
                    </div>
                    <div class="md-form">
                        <input type="password" id="txtPassword" name="txtPassword" class="form-control">
                        <label for="txtPassword">Enter password</label>
                    </div>
                    <button type="submit" class="btn btn-info" name="btnLogin">Login</button>
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