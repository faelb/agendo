<?php
session_start();
$pdo = new PDO("mysql:host=10.0.3.18;dbname=userdatabase", "root", "");

$user_mail = $_GET['email'];
$input = $_GET['inputVal'];
$type = $_GET['type'];



$get_id_sql = "SELECT id FROM users WHERE email='" . $user_mail . "'";
$user_id = $pdo->query($get_id_sql)->fetch();


//hier wird nach dem foreign Key gesucht und in die data Tabelle die Data eingefügt //WHERE fid='" . $user_id['id'] . "'";
//$insert_sql = "INSERT INTO data(type, data) VALUES(:type, :data)";

$statement = $pdo->prepare("INSERT INTO data(type, data, fid)VALUES(:type,:data,:fid)");
$statement->execute(array(":type" => $type, ":data" => $input, ":fid" => $user_id['id']));

?>

<!--<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Jaja</h1>
</body>
</html>-->
