<?php

include('db.php');

$name = $_POST['name'];
$score = $_POST['score'];

$sql = "INSERT INTO `myTable` (`name`, `score`) VALUES ('$name', $score)";

$result = mysqli_query($conn, $sql);

if($result){
    header("location: index.php");
}else{
    echo "Cannot enter data";
}