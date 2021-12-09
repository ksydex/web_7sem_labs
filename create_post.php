<?php
include "db.php";

$name = $_POST["name"];
$description = $_POST["description"];
$price = (int)$_POST["price"];

$sql = "INSERT projects(name, description, price) VALUES(?,?,?)";

$stmt = $db->prepare($sql);
$stmt->bind_param("ssi", $name, $description, $price);
$stmt->execute();
$r = $stmt->get_result();
$id = $db->insert_id;
$db->close();

if(isset($r)) header("location: project.php?id=". $id);
else header ("location error.php");