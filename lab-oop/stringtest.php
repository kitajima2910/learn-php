<?php

class strings {
    function strings() {
        echo "This function is a constructor.";
    }
    function stringdisp() {
        echo "This is function.";
    }
}

class display extends strings {
    function display() {
        echo "This is a constructor of a new class.";
    }
}

$displ = new strings();

echo "<br><br>";
$disp = new display();