<?php

class usermail {
    var $username = "john";
    var $password = "abc123";

    function dispuser() {
        echo $this->username . "<br><br>";
        echo $this->password . "<br><br>";
    }
}


class userdetails extends usermail {
    var $secretdetails = "Favorite food";
    var $answer = "Chinese";

    function dispdetail() {
        echo "<br><br>";
        echo $this->secretdetails . "<br><br>";
        echo $this->answer . "<br><br>";
    }
}

$mail = new userdetails();
$maill = new usermail();
$disp1 =$mail->dispdetail();
$disp2 = $maill->dispuser();
