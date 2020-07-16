<?php

$DB_URL = "mysql:host=localhost;dbname=db_fileupload;charset=utf8";
$DB_USER = "root";
$DB_PASS = "";

try {
    $conn = new PDO($DB_URL, $DB_USER, $DB_PASS);
} catch (\Throwable $th) {
    echo $th->getMessage();
}
