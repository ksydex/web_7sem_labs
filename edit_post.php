<?php
include "db.php";

$id = $_GET["id"];
$name = $_POST["name"];
$description = $_POST["description"];
$price = (int)$_POST["price"];

$sql = "UPDATE projects SET name=?, description=?, price=? WHERE id=?";

$stmt = $db->prepare($sql);
$stmt->bind_param("ssii", $name, $description, $price, $id);
$stmt->execute();
$r = $stmt->get_result();
$db->close();

if(isset($r)) header("location: project.php?id=". $id);
else header ("location error.php");