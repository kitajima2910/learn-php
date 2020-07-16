<?php

session_start();

if(isset( $_SESSION["infoAccount"])) {
    header("location: show.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Please Login Your ID</h2>
    <form action="process.php" method="post">
        <label for="txtId">ID:</label> <br>
        <input type="text" name="txtId" required id="txtId"> <br> <br>
        <label for="txtPasswprd">Password:</label> <br>
        <input type="password" name="txtPasswprd" required id="txtPasswprd"> <br> <br>
        <button type="submit" name="btnLogin">Login</button>
    </form>
</body>
</html>