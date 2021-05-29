<?php
    include('../private/function.php');
    include('../private/db.php');

    session_start();

    if(isset($_SESSION['user_id']))
    {
        header('location: index.php');
        die;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password))
        {
            $sql = "SELECT * FROM user_data WHERE username = '$username' LIMIT 1";
            $result = mysqli_query($con, $sql);

            if($result && mysqli_num_rows($result)>0)
            {
                $userData = mysqli_fetch_assoc($result);


                if($userData['password'] === $password)
                {
                    $user_id = $userData['user_id'];
                    $_SESSION['user_id'] = $user_id;
                    header('location: index.php');
                    echo "hello";
                }else{
                    echo "Password Incorrect";
                }

            }
        }else{
            echo "Username or password incorrect";
        }
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../private/style.css">
    <script src="../private/app.js" defer></script>
</head>
<body>
    <header>
        <div>
            <h1 class="login_logo"><a href="">E-Commerce Login</a></h1>
        </div>
    </header>

    <div class="login_box">
    <h2 class="login_heading">Login To Your Account</h2>
        <form class="login_form" action="" method="post">
            <input type="text" autocomplete="off" name="username" id="username" placeholder="Username" >
            <input type="password" autocomplete="off" name="password" id="password" placeholder="Password" >
            <input type="submit" value="Login" name="submit" id="login_btn">
            <h3><a href="register.php" class="new">Or SignUp</a></h3>
        </form>

        
    </div>


    
    
</body>
</html>