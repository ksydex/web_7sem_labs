<?php

include "db.php";

$login = $_POST["login"];
$password = $_POST["password"];

$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users(login, password_hashed) VALUES(?,?)";

$stmt = $db->prepare($sql);
$stmt->bind_param("ss", $login, $password);
$stmt->execute();
$r = $stmt->get_result();

if(isset($r)) {
    header("location: sign-in.php");
}
else echo 'Error while signing up a user';