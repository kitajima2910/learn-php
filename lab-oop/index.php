<?php

// include "empdetail.inc";

// echo "The Employee details: <br><br>";
// $empdest = new empdetail();
// $empdest->enteremp(101, "John Williams", "Miami");
// echo $empdest->empid . "<br>"; 
// echo $empdest->empname . "<br>";
// echo $empdest->empcity . "<br>";


include "net_salary.inc.php";

echo "The Salary details of the employee: <br><br>";
try {
    $sal = new net_salary();
    echo $sal->net(372500);
} catch (\Throwable $th) {
    echo $th->getMessage();
}


?>
