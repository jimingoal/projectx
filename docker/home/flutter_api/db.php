<?php

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

$db_name = "school";
$db_server = "mariadb";
$db_user = "myuser";
$db_pass = "myuser12345";

$db = new PDO("mysql:host={$db_server};dbname={$db_name};charset=utf8", $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
