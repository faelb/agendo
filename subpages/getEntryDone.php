<?php
$pdo = new PDO("mysql:host=10.0.3.18;dbname=userdatabase;port=3306", "root", "root_password");

$user_mail = $_GET['email'];
$type = $_GET['type'];


//get user id via e-mail (@live via $_GET)
$get_id_sql = "SELECT id FROM users WHERE email='" . $user_mail . "'";
$user_id = $pdo->query($get_id_sql)->fetch();
$user_id = $user_id['id'];


$statement = "SELECT data FROM data WHERE fid=$user_id AND type='" . $type . "' AND checked=1"; // AND type=$typ

foreach ($pdo->query($statement) as $row){
    $dataRequest[] = $row['data'];
}
echo json_encode($dataRequest);
?>