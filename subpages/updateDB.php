<?php
$pdo = new PDO("mysql:host=localhost;dbname=userdatabase", "root", "");

$user_mail = $_GET['email'];
$type = $_GET['type'];
$dataToSetDone = $_GET['data'];

//get user id via e-mail (@live via $_GET)
$get_id_sql = "SELECT id FROM users WHERE email='" . $user_mail . "'";
$user_id = $pdo->query($get_id_sql)->fetch();
$user_id = $user_id['id'];


$statement = "UPDATE data SET checked=1 WHERE fid=$user_id AND data='" . $dataToSetDone . "'";
$stmt = $pdo->prepare($statement);
$stmt->execute();
?>