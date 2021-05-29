
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php
    if(isset($_GET['edit_product_id'])){
        echo "Edit Product";
    }else{
        echo "Add Product";
    }
    ?>
    </title>    
    <link rel="shortcut icon" type="image/png" href="../private/images/logo.png"/> 
    <link rel="stylesheet" href="../private/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="../private/app.js" defer></script>
</head>
<body>
    <div class="insert_product_container">
        <nav class="insertproduct">
            <div class="insert_product_title">
                <h1><?php if(isset($_GET['edit_product_id'])){
                    echo "Edit Product";
                }else{
                    echo "Add Product";
                }?></h1>
            </div>

            <div class="admin_account">
                <i></i>
                <p><a href="admin.php">Hello, Admin</a></p>

            </div>


        </nav>

        <section>

        <form action='' method='POST' class='product_form' enctype='multipart/form-data'>
                <input type='number' name='product_id' placeholder='Product ID'>
                <input type='text' name='product_name' placeholder='Product Name'>
                <input type='text' name='product_desc' placeholder='Product Description'>
                <input type='number' name='product_rating' placeholder='Product Rating'>
                <input type='number' name='product_price' placeholder='Product Price'>
                <input type='file' name='product_image'>
                <input type='submit' name='submit' value='Add Product'>

        </form>
        
        </section>


    </div>
    
</body>
</html>

<?php

include('../private/function.php');
include('../private/db.php');


if(isset($_POST['submit']))
{

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $product_rating = $_POST['product_rating'];
    $product_price = $_POST['product_price'];

    $product_image = $_FILES['product_image']['name'];

    $tempname = $_FILES['product_image']['tmp_name'];

    $folder = "../private/images/" .$product_image;

    move_uploaded_file($tempname, $folder);


    if(!empty($product_id) && !empty($product_name) && !empty($product_desc) && !empty($product_rating) && !empty($product_price) && !empty($product_image))
    {
        
        $sql = "INSERT INTO products 
        (product_id, product_name, product_desc, product_rating, product_price, product_image) value
        ('$product_id','$product_name','$product_desc','$product_rating','$product_price','$folder')";    

        $result = mysqli_query($con, $sql);

        if($result){
            $error = "Successfully inserted";
        }

        if(!$result){
            $error = "Task Failed, Try again!";
        }
    }else{
        $error = "Please fill out all the fields ";
    }
    
}
?>
