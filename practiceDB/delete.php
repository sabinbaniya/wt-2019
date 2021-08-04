<?php
    include('db.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM `myTable` WHERE `id` = $id";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
        header("location: index.php");
    }

?>