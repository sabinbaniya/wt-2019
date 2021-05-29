<?php

SESSION_START();

if(isset($_SESSION['user_id']))
{
    unset($_SESSION['user_id']);
}

header("location: login.php");
die;