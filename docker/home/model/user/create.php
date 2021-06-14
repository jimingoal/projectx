<?php

function user_model_create() {
    global $db;
    $name = $_REQUEST['name'];
    $age = (int) $_REQUEST['age'];

    $stmt = $db->prepare("INSERT INTO users (name, age) VALUES (?, ?)");
    $stmt->bind_param('si', $name, $age);
    return $stmt->execute();
}
