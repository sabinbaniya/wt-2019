<?php

session_start();

include('../private/function.php');
include('../private/db.php');

$userData = check_login($con);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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


        <div class="checkout_div">
        <div class="checkout_cart_items">
    
        <table id="checkout_table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th class="rating_checkout">Rating</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>

                <?php

                if(isset($_GET['product_id']))
                {
                    $product_id = $_GET['product_id'];
                    $sql = "SELECT * FROM products WHERE product_id = '$product_id'";

                    $result = mysqli_query($con, $sql);

                   
                    $product_data = mysqli_fetch_assoc($result);
                    $total = 0;
                    ?>
                    
                            <tr>
                            <td><img src="<?= $product_data['product_image']?>" class='cart_img' ></td>
                            <td><?= $product_data['product_name']; ?></td>
                            <td class='rating_checkout'><?= rg($product_data['product_rating']); ?></td>
                            <td>$ <?= $product_data['product_price']; ?></td>
                            </tr>
                
                <?php
                    $total = $total + $product_data['product_price'];
                }else{
                    $total = 0;
                }

                if(isset($_COOKIE['shopping_cart']))
                {
                    $cart_items = $_COOKIE['shopping_cart'];
                    $cart_items2 = stripslashes($cart_items);
                    $cart_products = json_decode($cart_items2, true);
                
                    foreach($cart_products as $c){
                
                    
                   ?>
                    <tr>
                    <td><?="<img src= $c[product_image] class='cart_img'>";?></td>
                    <td><?=$c['product_name'];?></td>
                    <td class="rating_checkout"><?=rg($c['product_rating']);?></td>
                    <td><?="$ ".$c['product_price'];?></td>
                    </tr>
                    <?php
                
                    $total = $total + ($c['product_qty']*$c['product_price']);
                    }
                    }?>
                    
                    <tr>
                        <td colspan="3" align="right" style="padding-right: 10px;">Cart Total</td>
                        <td colspan="1" align="center"><?="$ ". $total;?></td>
                    </tr>
                    
            </tbody>
        </table>
            
        </div>
        <div class="delivery_options">
            <div class="content">
                <h1>Select Payment Option</h1>
                <input type="radio" name="COD" id="COD" selected >
                <label for="COD">Cash On Delivery</label>
                <p>
                 <small>  
                 Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates assumenda animi officia, ratione ad excepturi aliquid vel vitae amet aliquam asperiores deserunt voluptas dolorum repellat. Perspiciatis deleniti nostrum minima quia?
                 </small> </p>
                 <h3 style="color: black;">Your Total: </h3>
                 <?= "$ ". $total;  ?>
                <div>
                 <input type="submit" value="Place Order" id="place_order">
                 </div>
            </div>

        </div>

        </div>

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
    const placeOrder = document.querySelector('#place_order');

        placeOrder.addEventListener('click', redirect);

        function redirect() 
        {
            location.replace("index.php?command=orderplaced");
        }
    
    
    </script>
</body>
</html>