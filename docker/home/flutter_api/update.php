<?php
header('Content-Type: application/json');
include "./db.php";

$id = $_POST['id'];
$name = $_POST['name'];
$age = (int) $_POST['age'];

$stmt = $db->prepare("UPDATE student SET name = ?, age = ? WHERE id = ?");
$result = $stmt->execute([$id, $name, $age]);

echo json_encode([
    'success' => $result
]);