<?php
    include('db.php');

    $id = $_GET['id'];
    $name = $_POST['name'];
    $score = $_POST['score'];

    $sql = "UPDATE `myTable` SET `name` = '$name' , `score` = '$score' WHERE `id` = $id";

    $result = mysqli_query($conn ,$sql);

    header("location: index.php");
?>