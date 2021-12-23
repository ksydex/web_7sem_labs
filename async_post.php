<?php
include "db.php";

$name = $_GET['text'];

$sql = "SELECT  projects(name, description, price) VALUES(?,'x','x')";

$sql = "select * from projects WHERE lower(name)=?";
$stmt = $db->prepare($sql);
$stmt->bind_param("s", $name);
$stmt->execute();

if($stmt->get_result()->num_rows > 0) {
    http_response_code(409);
    return;
}

$sql = "INSERT projects(name, description, price) VALUES(?,'x', 400)";

$stmt = $db->prepare($sql);
$stmt->bind_param("s", $name);
$stmt->execute();

$db->close();