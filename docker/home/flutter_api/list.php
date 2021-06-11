<?php

//PDO

//$stmt = $db->prepare("SELECT id, name, age FROM student");
//$stmt->execute();
//$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//echo json_encode($result);

//미션 1
//
//$sql = "SELECT * FROM student";
//$result = $db->query($sql);
//
//if ($result->num_rows > 0) {
//    // output data of each row
//    $rets[] = [];
//    while($row = $result->fetch_assoc()) {
////        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - age: " . $row["age"]. "<br>";
//            $rets[] = $row;
//    }
//    echo json_encode($rets);
//} else {
//    echo "0 results";
//}
//$db->close();


//미션 1-2

$sql = "SELECT * FROM student";
$stmt = $db->stmt_init();
$stmt = $db->prepare($sql);
$stmt->execute();

$result = $stmt->get_result(); // get the mysqli result
if ($result === false) {
    $this->handleError("SQL ERROR on row()", $sql);
    return [];
}
/* fetch associative array */
$rets = [];
while ($row = $result->fetch_assoc()) {
    $rets[] = $row;
}
echo json_encode($rets);

