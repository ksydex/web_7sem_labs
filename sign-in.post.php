<?php

include "db.php";

session_start();

$login = $_POST["login"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE login=?";

$stmt = $db->prepare($sql);
$stmt->bind_param("s", $login);
$stmt->execute();

$result = $stmt->get_result()->fetch_assoc();

if ($result == null) {
    echo "Either login or password is invalid";
    header("location: sign-in.php");
}

if (password_verify($password, $result["password_hashed"])) {
    $userId = $result['id'];
    $_SESSION['userId'] = $userId;
    $hash = md5($userId);

    echo $userId;

    $sql = "UPDATE users SET token=? WHERE id=?";

    $stmt = $db->prepare($sql);
    $stmt->bind_param("si", $hash, $userId);
    $res = $stmt->execute();
    if (!$res) {
        echo 'error';
        return;
    }

    setcookie('token', $hash, time()+60*60*24*30);

    header("location: index.php");
}