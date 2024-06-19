<?php

$cookie_name1='email';
$cookie_name2='parola';
unset($_COOKIE['email']);
unset($_COOKIE['parola']);
setcookie($cookie_name1, '',time() - 3600);
setcookie($cookie_name2, '', time() - 3600);
session_start();
session_unset();
session_destroy();
header("location:index.php");
?>

