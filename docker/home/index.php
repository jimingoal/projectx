<?php
header('Content-type: application/json');
echo json_encode(
    [
        "a" => "apple", 
        "b" => "banana",
        "c" => "cherry"
        ]
);

// phpinfo();
?>