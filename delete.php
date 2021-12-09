<?php
include "db.php";

$id = $_GET["id"];
if(!isset($id)) header ("location error.php");

$sql = "DELETE FROM projects WHERE id=?";

$stmt = $db->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$r = $stmt->get_result();
$db->close();

if(isset($r)) header("location: /");
else header ("location error.php");