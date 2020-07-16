<?php 

session_start();

if(isset($_SESSION["infoAccount"])) {
    echo "<h2>Login success. Welcome, " . $_SESSION['infoAccount'] . "</h2>";
    echo "<a href='logout.php'>Logout</a>";
}

?>