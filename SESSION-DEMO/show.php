<?php 

session_start();

if(isset($_SESSION["infoAccount"])) {
    $txtinfoAccount = $_SESSION["infoAccount"];
    echo "Thank $txtinfoAccount login to website!!!";
    echo "<br><a href='logout.php'>Logout</a>";
}

?>