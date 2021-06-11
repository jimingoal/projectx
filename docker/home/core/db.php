<?php
header('Content-Type: application/json');
$db_server = "mariadb";
$db_name = "mydb";
$db_user = "myuser";
$db_pass = "mypass12345";


//PDO

//$db = new PDO("mysql:host={$db_server};dbname={$db_name};charset=utf8", $db_user, $db_pass);
//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*미션1
 PDO -> mysqli로 변환하고 try-catch문을 사용하세요.*/

$db = new mysqli($db_server, $db_user, $db_pass, $db_name);

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}






