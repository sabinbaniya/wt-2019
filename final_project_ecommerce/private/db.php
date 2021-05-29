<?php

    $username = "root";
    $password = "";
    $servername = "localhost";
    $db_name = "user_login_data";

    $con = mysqli_connect($servername,$username,$password,$db_name);

    if(!$con)
    {
        die ("Connection failed". mysqli_connect_error());
    }

