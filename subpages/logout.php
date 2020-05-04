<?php
session_start();
$pdo = new PDO("mysql:host=10.0.3.18;dbname=userdatabase", "root", "");

session_destroy();
echo "You have been successfully logged out";
header("Location: ../index.php");


?>

