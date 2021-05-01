<?php
session_start();
require_once("connect_sql.php");
$email = $_POST["email"];
$password = $_POST["password"];
$query = "SELECT * FROM users WHERE email='$email' and password='$password'";
$result = $conn->query($query);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()) {
    if($email == $row["Email"] and $password == $row["Password"]){
    	$_SESSION["login"]=true;
    	header("Location: ../dashboard.php");
    }
    	
  }
}else{
	header("Location: ../login.php");
}

?>