<?php
header('Content-Type: application/json');
include "../flutter_api/db.php";

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

$stmt = $db->prepare("SELECT id, name, age from student");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
