<?php

session_start();

if(isset($_SESSION['admin_username']))
{
    unset($_SESSION['admin_username']);
}


header('location: admin_login.php');
die;