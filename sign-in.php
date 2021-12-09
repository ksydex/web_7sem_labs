<?php
session_start();
include "db.php";
if (isset($_SESSION['userId'])) {
    header('location index.php');
}
else {
    if (!isset($_COOKIE['token'])) {

    } else {
        $token = $_COOKIE['token'];
        $sql = "SELECT * FROM users WHERE token=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();
        if ($result == null) {
        } else {
            $_SESSION['userId'] = $result['id'];
            header('location index.php');
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in</title>
</head>
<body>
<main>
    <?php echo(isset($_SESSION['userId']) ? "authorized" : "non authorized") ?>
    <form action="sign-in.post.php" method="POST">
        <input placeholder="Login" type="text" name="login"/>
        <input placeholder="Password" type="password" name="password"/>
        <input type="submit" value="Sign in">
    </form>
    <a href="sign-up.php">Sign up</a>
</main>
</body>
</html>