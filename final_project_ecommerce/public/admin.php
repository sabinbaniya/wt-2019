<?php 

include('../private/db.php');

session_start();

if(isset($_SESSION['admin_username']))
{
    $admin_username = $_SESSION['admin_username'];

    $sql = "SELECT * FROM admin_data WHERE admin_username = '$admin_username' LIMIT 1 ";
    $result = mysqli_query($con, $sql);

    $admin_data = mysqli_fetch_assoc($result);


}else{
    header('location:admin_login.php');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Area</title>
    <link rel="shortcut icon" type="image/png" href="../private/images/logo.png"/> 
    <link rel="stylesheet" href="../private/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="../private/app.js" defer></script>
</head>
<body>
    <header>
        <nav class="admin_area_nav">
            <div>
                <h1 class="admin_logo"><a href="">E-Commerce Admin Area</a></h1>
            </div>
            <div class="user_items">
                    <div class="user_account"  id="user_account_icon">
                    <i class="fas fa-user-circle user_account "></i>
                    <a href="admin_logout.php" class="logout" id="logout">Log Out</a>
                    </div>
                    <div class="user">
                    <p>Hi <?= $admin_username;?></p>
                    </div>
            </div>
        </nav>
    </header>

    <div class="admin_area">
    <section >
        <div class="insert_product_admin_area">
            <a href="insert_product.php" class="a">Insert New Product</a>
        </div>
    </section>

    <section class="all_products">

    <h1>All Products</h1>

    <?php
        include('../private/function.php');
        product_table();

    ?>
    

    </section>
    </div>

</body>
</html>