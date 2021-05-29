<?php

include('db.php');

function create_product($src,$name,$desc,$rating,$price){
    echo "<div class='product'>";
    
        echo "<div>";
        echo "<img class='product_img' src='$src'>";
        echo "</div>";

        echo "<div class='product_name'>";
        echo "<h2>$name</h2>";
        echo "</div>";

        echo "<div class='product_desc'>";
        echo "<p>$desc</p>";
        echo "</div>";

        echo "<div class='product_rating'>";
        rg($rating);
        echo "</div>";

        echo "<div class='product_price'>";
        echo "<p>$price</p>";
        echo "</div>";

    echo"</div>";
}

function get_products_from_database(){

    include('db.php'); 
    
    $product_id = 1;

    $sql = "SELECT * FROM products";

    $result = mysqli_query($con, $sql);

    $row = mysqli_num_rows($result); 

    while ($product_id <= $row)
    {

        $sql = " SELECT * FROM products WHERE product_id = '$product_id'";

        $returned_product = mysqli_query($con, $sql);

        $result = mysqli_fetch_assoc($returned_product);
    
        $product_id = $result['product_id'];
        $product_name = $result['product_name'];
        $product_desc = $result['product_desc'];
        $product_rating = $result['product_rating'];
        $product_price = $result['product_price'];
        $src = $result['product_image'];

        

        echo "<div class='product'>";
    
            echo "<div>";
            echo "<img class='product_img' src='$src'>";
            echo "</div>";

            echo "<div class='product_name'>";
            echo "<h2>$product_name</h2>";
            echo "</div>";

            echo "<div class='product_desc'>";
            echo "<p>$product_desc</p>";
            echo "</div>";

            echo "<div class='product_rating'>";
            rg($product_rating);
            echo "</div>";

            echo "<div class='product_price'>";
            echo "<p> $ $product_price</p>";
            echo "</div>";

            echo "<a href='product.php?product_id=$product_id' class='buy_now_btn' >Details</a>";
            echo "<a href='cart.php?product_id=$product_id' class='add_to_cart_btn' >Add to cart</a>";

        echo"</div>";

        $product_id++;

    }

}


function rg($stars){

    $start=0;

    while ($start<$stars){
        echo "<i class='fas fa-star stars'></i>";
        $start++;

    };

    if($stars < 5){

        $remaining = abs($stars-5);

        for($i=0;$i<$remaining;$i++){
            echo "<i class='far fa-star stars'></i>";
        }
    }
}

//login session check
function check_login($con)
{

    if(isset($_SESSION['user_id'])) {

        $id = $_SESSION['user_id'];
        $sql = "SELECT * FROM user_data WHERE user_id = '$id' LIMIT 1";

        $result = mysqli_query($con, $sql);

        if($result && mysqli_num_rows($result)>0){

            $userData = mysqli_fetch_assoc($result);
            return $userData;

        }

    }else{
        header("location: login.php");
    }   

    die ;
}

function random_num($length){
     $text = "";

     if($length < 5)
     {
         $length = 5;
     }

     $len = rand(4, $length);

     for($i=0; $i<$len; $i++)
     {
         $text .= rand(0,9);
     }

     return $text;
}


//product page function

function create_product2($src,$name,$desc,$rating,$price, $product_id){
    echo "<div class='main_product'>";
    
        echo "<div>";
        echo "<img class='main_product_img' src='$src'>";
        echo "</div>";

        echo "<div class='col-2'>";
            echo "<div class='main_product_name'>";
            echo "<h2>$name</h2>";
            echo "</div>";

            echo "<div class='main_product_desc'>";
            echo "<p>$desc</p>";
            echo "</div>";

            echo "<div class='main_product_rating'>";
            rg($rating);
            echo "</div>";

            echo "<div class='main_product_price'>";
            echo "<p> $ $price</p>";
            echo "</div>";

            echo "<div class='main_product_buttons'>";
            echo "<a href='checkout.php?product_id=$product_id' class='buy_now_btn main_btn' >Buy Now</a>";
            echo "<a href='cart.php?product_id=$product_id' class='add_to_cart_btn main_cart_btn' >Add to cart</a>";
            echo "</div>";
        echo "</div>";          

    echo"</div>";
}

function get_products_from_database_for_products_page(){

    include('db.php'); 
    
    $product_id = 1;

    $sql = "SELECT * FROM products";

    $result = mysqli_query($con, $sql);

    $row = mysqli_num_rows($result); 

    $cart = isset($_COOKIE['shopping_cart'])? $_COOKIE['shopping_cart']: "[]";

    $cart = json_decode($cart, true);

    $text = "Add To Cart";

    while ($product_id <= $row)
    {

        $sql = " SELECT * FROM products WHERE product_id = '$product_id'";

        $returned_product = mysqli_query($con, $sql);

        $result = mysqli_fetch_assoc($returned_product);
    
        $product_id = $result['product_id'];
        $product_name = $result['product_name'];
        $product_desc = $result['product_desc'];
        $product_rating = $result['product_rating'];
        $product_price = $result['product_price'];
        $src = $result['product_image'];

        $cart_items = isset($_COOKIE['shopping'])? $_COOKIE['shopping_cart'] : "[]";
        $cart_items = json_decode($cart_items, true);

        if(isset($_GET['product_id'])){

            $main_product_id = $_GET['product_id'];

            if($product_id != $main_product_id){

                foreach($cart_items as $c)
                {
                    var_dump($c['product_name']);

                    if($c['product_name'] == $product_name)
                    {
                        echo "Delete from cart";
                        break;
                    } 
                }

                echo "<div class='product_page_product'>";
    
                echo "<div>";
                echo "<img class='p_product_img' src='$src'>";
                echo "</div>";

                echo "<div class='p_product_name'>";
                echo "<h2>$product_name</h2>";
                echo "</div>";

                echo "<div class='p_product_desc'>";
                echo "<p>$product_desc</p>";
                echo "</div>";

                echo "<div class='p_product_rating'>";
                rg($product_rating);
                echo "</div>";

                echo "<div class='p_product_price'>";
                echo "<p> $ $product_price</p>";
                echo "</div>";

                echo "<a href='product.php?product_id=$product_id' class='buy_now_btn' >Details</a>";
                echo "<a href='cart.php?product_id=$product_id' class='add_to_cart_btn' >$text</a>";
                echo"</div>";

            }

        }

        $product_id++;
        
    }

}

//admin area function
function product_table(){
    include('../private/db.php');

    $sql = "SELECT * FROM products ";

    $all_products = mysqli_query($con, $sql);

    $row = mysqli_num_rows($all_products);


    if($row > 0)
    {

        echo "<table  id='products'>";
        echo "<thead>
                    <tr>
                        <th>Serial Number</th> 
                        <th>Product Id</th>
                        <th>Product Image</th> 
                        <th>Product Name</th> 
                        <th>Product Description</th>  
                        <th>Product Rating</th> 
                        <th>Product Price</th>  
                        <th>Edit</th> 
                        <th>Delete</th>                  
                    </tr>
               </thead>
               ";

        $product_num = 1;

        while($product_num<=$row)
        {
            $sql = "SELECT * FROM products WHERE product_id = '$product_num' ";
            $product_item = mysqli_query($con, $sql);

            $result = mysqli_fetch_assoc($product_item);



            $p_id = $result['product_id'];
            $p_src = $result['product_image'];
            $p_name = $result['product_name'];
            $p_desc = $result['product_desc'];
            $p_rating = $result['product_rating'];
            $p_price = $result['product_price'];

            echo "
                    <tr>
                        <td>$p_id</td>
                        <td>$p_id</td>
                        <td><img class='product_img_table'src='$p_src'></td>
                        <td>$p_name</td>
                        <td>$p_desc</td>
                        <td>$p_rating</td>";
                        

                        if($p_id>0){
                            echo "    
                            <td>$ $p_price</td> 
                            <td><a href='edit_product.php?edit_product_id=$p_id'>Edit</a></td>
                            <td><a href='delete.php?delete_product_id=$p_id'>Delete</a></td>
                    </tr>";
                        }
                   
                   

            $product_num++;

        
        }

        
        echo "</tbody>";
        echo "</table>";

  
    }else{
        echo "<h1 style='color:red;'>No Products Found</h1>";
    }

    
}

