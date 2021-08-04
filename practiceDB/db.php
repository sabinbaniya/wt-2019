<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "practiceDB";

$conn = mysqli_connect($hostname, $username, $password, $database);

if(!$conn){
    echo "Connection Error";
}