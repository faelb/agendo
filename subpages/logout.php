<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=userdatabase", "root", "");

session_destroy();
echo "You have been successfully logged out";
header("Location: ../index.php");


?>

