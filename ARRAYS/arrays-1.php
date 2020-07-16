<?php

// $phim = [
//     "Hành động" => ["John Wick", "Kẻ huỷ diệt", "Người vận chuyển"],
//     "Viễn tưởng" => ["Endgame", "Infinity War"],
//     "Lãng mạn" => ["La La Land"],
//     "Kịch tính" => ["Tên trộm và cô chủ nhà"]
// ];


// print_r($phim);


$arr["a"] = "M";
$arr["b"] = "C";
$arr["z"] = "T";
$arr["c"] = "E";

print_r($arr);

// sort($arr);
// rsort($arr);
// asort($arr);
// $arrTmp = array_flip($arr);
// $arrTmp = array_reverse($arrTmp);
$item = array_pop($arr);
echo "<br>";

print_r($item);