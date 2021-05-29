<?php

session_start();

include('../private/function.php');
include('../private/db.php');


$userData = check_login($con);

if(isset($_GET['clearcart']))
{
    setcookie('shopping_cart', "", time()-3600);
    header('location: cart.php?cart_items_cleared');
}

if(isset($_GET['action']))
{
    if($_GET['action'] == "delete")
    {
        $cart_items4 = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cart_items4, true);

        foreach($cart_data as $key => $values)
        {
            if($cart_data[$key]['product_id'] == $_GET['id'])
            {
                unset($cart_data[$key]);
                $item_data = json_encode($cart_data);
                setcookie("shopping_cart", $item_data, time() + (86400 * 30));
                header('location: cart.php?removed=1');
            }
        }
    }
}

if(isset($_GET['product_id']))
{
    if(isset($_COOKIE['shopping_cart']))
    {
        $cart_items3 = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cart_items3, true);

    }else{
        $cart_data = array();
    }

    $item_id_list = array_column($cart_data, 'product_id');

    if(in_array($_GET['product_id'], $item_id_list))
    {
        foreach($cart_data as $key =>$values){
            if($cart_data[$key]['product_id'] == $_GET['product_id'])
            {
                $cart_data[$key]['product_qty'] = 1 + $cart_data[$key]['product_qty'];
            }

        }

    }else{
        $product_id = $_GET['product_id'];

        $sql = "SELECT * FROM products WHERE product_id ='$product_id'";

        $result = mysqli_query($con, $sql);

        $product_details = mysqli_fetch_assoc($result);

        $p_name = $product_details['product_name'];
        $p_rating = $product_details['product_rating'];
        $p_price = $product_details['product_price'];
        $p_image = $product_details['product_image'];
        $p_qty = 1;

        $item_array = array(
            "product_id"      =>$product_id,
            "product_name"    =>$p_name,
            "product_rating"  =>$p_rating,
            "product_price"   =>$p_price,
            "product_image"   =>$p_image,
            "product_qty"     =>$p_qty

    );

    $cart_data[] = $item_array;

    }

    

    $item_data = json_encode($cart_data);
    setcookie('shopping_cart', $item_data, time() +(86400*30));
    header('location: index.php?success=1');


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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


<div class="table">


    <h1 style="text-align: center; margin-bottom: 1rem;">Your Cart <i class="fas fa-cart-arrow-down"></i> </h1>
    <?php if(isset($_COOKIE['shopping_cart'])){?>
    <div class="clear-all-div">
    <a href="cart.php?clearcart=1" id="clear-all">Clear All Items</a>
    <a href="checkout.php" id="checkout">Proceed to checkout</a>
    </div>
    <?php } ?>

<table id="cart_table">
<thead>
<tr>
<th>Image</th>
<th>Name</th>
<th>Rating</th>
<th>Quantity</th>
<th>Price</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php
if(isset($_COOKIE['shopping_cart']))
{
    $cart_items = $_COOKIE['shopping_cart'];
    $cart_items2 = stripslashes($cart_items);
    $cart_products = json_decode($cart_items2, true);
    $total = 0;

    foreach($cart_products as $c){

    
   ?>
    <tr>
    <td><?="<img src= $c[product_image] class='cart_img'>";?></td>
    <td><?=$c['product_name'];?></td>
    <td><?=rg($c['product_rating']);?></td>
    <td><?=$c['product_qty'];?></td>
    <td><?="$ ".$c['product_price'];?></td>
    <td><a href="cart.php?action=delete&id=<?= $c['product_id']?>">Delete</a></td>
    </tr>
    <?php

    $total = $total + ($c['product_qty']*$c['product_price']);
    }?>
    
    <tr>
        <td colspan="4" align="right" style="padding-right: 10px;">Cart Total</td>
        <td colspan="2" align="center"><?="$ ". $total;?></td>
    </tr>

<?php
}else{
    if(isset($_GET['command'])){
        if($_GET['command'] == "orderplaced")
            {
                echo "<tr><td colspan='6' align='center'>Your Order was placed successfully ! </td></tr>";
            }
        }else{
            echo "<tr><td colspan='6' align='center'>No Items Added in cart</td></tr>";
        }
        
}?>


<?php


?>
</tbody>


</table>
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

</body>
</html>