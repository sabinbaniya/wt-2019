<?php

include("../private/db.php");
include("../private/function.php");

SESSION_START();


if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password))
    {
        $user_id = random_num(20);
        $sql = "INSERT INTO user_data (user_id, username, password) VALUES ('$user_id','$username','$password')";

        mysqli_query($con, $sql);

        header("location: login.php");
        
        die;

    }else{
        echo "Please Enter Valid Information";
    }



}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Your Account</title>
    <link rel="shortcut icon" href="../private/images/logo.png" type="image/x-icon">  
    <link rel="stylesheet" href="../private/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="../private/app.js" defer></script>
</head>
<body>

    <header>
        <div>
            <h1 class="login_logo"><a href="">E-Commerce Register</a></h1>
        </div>
    </header>

    <div class="login_box">
        <h2 class="login_heading">Create New Account</h2>
            <form class="login_form" action="" method="POST">
                <input type="text" autocomplete="off" name="username" id="username" placeholder="Choose a username" >
                <input type="password" autocomplete="off" name="password" id="password" placeholder="Choose a password" >              
                <input type="password" autocomplete="off" name="re_password" id="re_password" placeholder="Retype-Password" >
                <input type="submit" value="Sign Up" name="submit" id="signup_btn">
            </form>
    </div>
    
</body>
</html>