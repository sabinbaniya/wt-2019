<?php  
require_once("connect_sql.php");
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$password=$_POST["password"];
$gender=$_POST["gender"];
$dob=$_POST["dob"];
$query="INSERT INTO users (`First_Name`,`Last_Name`,`Email`,`Password`,`Gender`,`DOB`) VALUES ('$fname','$lname','$email','$password','$gender','$dob')";
header("Location: ../login.php");
$conn->query($query);
var_dump($conn);
?>