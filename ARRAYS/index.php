<?php

$arr = array(
    7 => "a",
    2 => "b",
    3 => "c",
    4 => "d",
    5 => "e"
);

$arrStr = array(
    "a" => "Apple",
    "b" => "Banana",
    "ccc" => "Cyber",
    "d" => "Dizz",
    "e" => "Element"
);

$arrClone = ["A", "B", "C"];

$arrMeger = array_merge($arr, $arrStr, $arrClone);

// var_dump($arr);

// echo "<br>Index with key 4: " . $arr[4];
// echo "<br>Index with key 2: " . $arr[2];
// echo "<br> Length: " . count($arr);
// echo "<br>";

// for($i = 1; $i <= count($arr); $i++) {
//     echo $arr[$i] . "<br>";
// }

echo "<br>";

var_dump($arrMeger);

echo "<br>Arr:";

foreach($arr as $key => $value):
    echo "<br>" . $key . " " . $value;
endforeach;

echo "<br>ArrStr:";

foreach($arrStr as $key => $value):
    echo "<br>" . $key . " " . $value;
endforeach;

echo "<br>ArrStr:";

foreach($arrMeger as $key => $value):
    echo "<br>" . $key . " " . $value;
endforeach;

