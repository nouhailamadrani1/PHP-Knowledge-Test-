<?php
include_once 'db.php';

$conn = new Db;
$connDb = $conn->connection();
$sql = "SELECT * FROM question";
$stmt = $connDb->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll() ;

// var_dump($result) ;
// Convert the array to a JSON string
$jsonData = json_encode($result);

echo $jsonData;














