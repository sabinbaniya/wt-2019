<?php

session_start();

include('../private/db.php');

if(isset($_SESSION['admin_username']))
{
    header('location: admin.php');

}else{

    if(isset($_POST['submit']))
    {
        $admin_username = htmlspecialchars($_POST['admin_username']) ;
        $admin_password = htmlspecialchars($_POST['admin_password']);

        $sql = "SELECT * FROM admin_data WHERE admin_username = '$admin_username' LIMIT 1 ";
        $result = mysqli_query($con, $sql);
        $admin_login_data = mysqli_fetch_assoc($result);

        if($admin_login_data['admin_username'] === "$admin_username"){
            if($admin_login_data['admin_password'] === "$admin_password"){
                $_SESSION['admin_username'] = $admin_login_data['admin_username'];
                header('location:admin.php');
            }else{
                echo "<h1>Wrong Passoword</h1>";
            }
        }else{
            echo "<h1>Wrong Credentials</h1>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../private/style.css">
    <script src="../private/app.js" defer></script>
</head>
<body>

    <header>
        <div>
            <h1 class="login_logo"><a href="">E-Commerce Admin Login</a></h1>
        </div>
    </header>

    <div class="login_box">
    <h2 class="login_heading">Login To Your Admin Account</h2>
        <form class="login_form" action="" method="POST">
            <input type="text" autocomplete="off" name="admin_username" id="username" placeholder="Username" >
            <input type="password" autocomplete="off" name="admin_password" id="password" placeholder="Password" >
            <input type="submit" value="Login" name="submit" id="login_btn">
            <h3><a href="admin_register.php" class="new">Or SignUp</a></h3>
        </form>

        
    </div>
    
</body>
</html>