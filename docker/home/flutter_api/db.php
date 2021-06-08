<?php
header('Content-Type: application/json');
$db_server = "mariadb";
$db_name = "mydb";
$db_user = "myuser";
$db_pass = "mypass12345";

$db = new PDO("mysql:host={$db_server};dbname={$db_name};charset=utf8", $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//// Create connection
//$conn = new mysqli($db_server, $db_user, $db_pass);
//
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully";
?>
