<?php

include_once 'connection.php';

if(isset($_POST['btnAdd'])) {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $edition = $_POST['edition'];

    $sql = 'insert into tbbook(title, author, edition) values(?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title, $author, $edition]);
    header('location: index.php');

}