<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="shortcut icon" type="image/png" href="../private/images/logo.png"/> 
    <link rel="stylesheet" href="../private/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="../private/app.js" defer></script>
</head>
<body>

<?php 

include('../private/db.php');

if(isset($_GET['edit_product_id']))
{

    $edit_id = $_GET['edit_product_id'];

    $sql1 = "SELECT * FROM products WHERE product_id ='$edit_id'";

    $result = mysqli_query($con, $sql1);

    $product_data = mysqli_fetch_assoc($result);

    $product_id = $product_data['product_id'];
    $product_name = $product_data['product_name'];
    $product_desc = $product_data['product_desc'];
    $product_rating = $product_data['product_rating'];
    $product_price = $product_data['product_price'];
    $product_image = $product_data['product_image'];

    echo "
            <form action='' method='POST' class='product_form' enctype='multipart/form-data' >
                    <input type='number' name='product_id' placeholder='Product ID' value='$product_id' >
                    <input type='text' name='product_name' placeholder='Product Name' value='$product_name' >
                    <input type='text' name='product_desc' placeholder='Product Description' value='$product_desc' >
                    <input type='number' name='product_rating' placeholder='Product Rating' value='$product_rating' >
                    <input type='number' name='product_price' placeholder='Product Price' value='$product_price' >
                    <input type='file' name='product_image' value='$product_image' >
                    <input type='submit' name='submit' value='Update Product'>

            </form>
        ";
}

if(isset($_POST['submit']))
{
    $new_p_id = $_POST['product_id'];
    $new_p_name = $_POST['product_name'];
    $new_p_desc = $_POST['product_desc'];
    $new_p_rating = $_POST['product_rating'];
    $new_p_price = $_POST['product_price'];

    $new_p_image = $_FILES['product_image']['name'];

    $new_temp_name = $_FILES['product_image']['tmp_name'];

    $folder = "../private/images/" .$new_p_image;

    if(!empty($new_p_id) && !empty($new_p_name) && !empty($new_p_desc) && !empty($new_p_rating) && !empty($new_p_price) && !empty($new_p_image))
    {

    $sql = "UPDATE products SET product_id = '$new_p_id', product_name = '$new_p_name', product_desc = '$new_p_desc' , product_rating = '$new_p_rating', product_price = '$new_p_price', product_image = '$folder' WHERE products.product_id = '$product_id' ";

    $result = mysqli_query($con, $sql);

    if($result){
        echo "<h1>Successfully Updated</h1>";
    }

    }




}



?>

</body>
</html>



