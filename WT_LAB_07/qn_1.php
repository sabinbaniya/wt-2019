<?php
session_start();
?>
<!DOCTYPE html>

<html>
<body>

<?php

$_SESSION["name"] = "Sabin";
$_SESSION["email"] = "sabin@sabin.com";
echo $_SESSION["name"];

?>
</body>
</html>

<?php 
$name = "sabin";
$email = "sabin@sabin.com";
setcookie($name, $email, time() + (86400 * 30));
?>

<html>
<body>

<?php
if(!isset($_COOKIE[$name])) {
  echo 'cookie name not set';
} else {
  echo "cookie name is" . $_COOKIE[$name];
}
?>

</body>
</html>
