<?php

$arr = array(
    "A" => array(
        1 => "a",
        2 => "aa"
    ),
    "B" => array(
        "B1" => 1,
        "B2" => 2
    ),
    "C" => [
        "1B" => 1,
        "2B" => 2
    ],
    "Render" => array(
        "SSR" => "Server-Side Render",
        "CSR" => "Client-Side Render"
    )    
);

print_r($arr);

echo "<br>";

echo ($arr["Render"]["SSR"]);
echo "<br>";
echo ($arr["Render"]["CSR"]);