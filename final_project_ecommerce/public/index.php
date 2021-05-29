<?php

session_start();

include('../private/function.php');
include('../private/db.php');

$userData = check_login($con);

$message = "";

if(isset($_GET['success']))
{   
    $message = "Item added to cart";

}

if(isset($_GET['command']))
{
    if($_GET['command'] == "orderplaced")
    {
        setcookie('shopping_cart', "", time()-3600);
        header('location: cart.php?command=orderplaced');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="shortcut icon" type="image/png" href="../private/images/logo.png"/> 
    <link rel="stylesheet" href="../private/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="../private/app.js" defer></script>
</head>
<body>
 
<div class="container">
    <header>
            <nav>
                <div>
                    <h1 class="logo"><a href="index.php">E-Commerce</a></h1>
                </div>

                <div class="menu_items">
                    <ul id="menu_items_ul">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="">Special Products</a></li>
                        <li><a href="">Become Affiliate<a/></li>
                        <li><a href="cart.php">Cart</a></li>
                    </ul>
                </div>
                <div class="user_items">
                    <div class="user_account"  id="user_account_icon">
                    <i class="fas fa-user-circle user_account "></i>
                    <a href="logout.php" class="logout" id="logout">Log Out</a>
                    </div>
                    <div class="user">
                    <p>Hi <?= $userData['username'];?></p>
                    </div>
                </div>
                <div class="hamburger" id="hamburgerbtn">
                    <span class="line" id="line1"></span>
                    <span class="line" id="line2"></span>
                    <span class="line" id="line3"></span>
                </div>
            </nav>
        </header> 
 
    <section class="hero">
        <div class="hero_image">
            <?php if($message != ""){
            ?>
            <div id="cart_notice_div">
            <span id="cart_notice"><?= $message?><span id="dismiss">x</span></span>
            </div>
            <?php }?>
            <img class="hero_image" src="../private/images/hero-smol.jpg"> 
            <h1 class="product_text">Lorem ipsum dolor sit amet consectetur </h1>
            <button class="primary_btn"><a href="#showNOW">Buy Now</a></button>
        </div>
    </section>

    <section class="shop_now" id="showNOW">
        <div class="text">
            <h1>Shop Now</h1>
        </div>

        <div class="products">

            <?php
                get_products_from_database();
            ?> 
        </div>
    </section>
</div>

    <footer>
    <div class="footer">
        <div class="col3">
            <h1><a class="footer_logo" href="">E-Commerce</a></h1>
            <h3>Follow Us </h3>
            <div class="social_links">
                <ul>
                    <li><a href=""><i class="fab fa-instagram social_icons"></i></a></li>
                    <li><a href=""><i class="fab fa-facebook social_icons"></i></a></li>
                    <li><a href=""><i class="fab fa-behance-square social_icons"></i></a></li>
                </ul>
            </div>
        </div>
        

        <div class="col1">
            <ul class="useful_links">
                <li><h5>Useful Links</h5></li>
                <li class="footer_li"><a class="footer_links" href="">Special Offers</a></li>
                <li class="footer_li"><a class="footer_links" href="">Refund Policy</a></li>
                <li class="footer_li"><a class="footer_links" href="">Home</a></li>
                <li class="footer_li"><a class="footer_links" href="">Shipping</a></li>
                <li class="footer_li"><a class="footer_links" href="">Become a affiliate</a></li>
            </ul>
        </div>

        <div class="col2">
            
            <ul class="contact_details">
                <li><h5>Contact Us</h5></li>
                <li class="footer_li">+977 061 231-3213  or </br>+977 061 244-323</li>
                <li class="footer_li">info@ecommerce.com</li>
                <li class="footer_li">Pokhara, Nepal</a></li>
            </ul>
        </div>
    </div>

    </footer>
    <div class="copyright_info">
        <h4>Copyright &copy; <?=date('Y');?> E-commerce</h4>
    </div>

    <script>
    const dismiss = document.querySelector('#dismiss');
    const cartNotice = document.querySelector('#cart_notice');

    dismiss.addEventListener('click', dismissNotice);


    function dismissNotice()
    {
        if(cartNotice.style.display == "block ruby")
        {
            cartNotice.style.display = "none";
        }else{
            cartNotice.style.display = "block ruby";   
        }
    }

    
    
    </script>
</body>
</html>

<?php



?>