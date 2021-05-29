<?php

include('../private/db.php');

if(isset($_GET['delete_product_id']))
{
    $delete_id = $_GET['delete_product_id'];

    $sql = "DELETE FROM products WHERE product_id = '$delete_id' ";

    $result = mysqli_query($con, $sql);

    if($result){
        echo "<Deleted";
    }
}

header('location:admin.php');
