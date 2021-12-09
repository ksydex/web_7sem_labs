<?php

include_once "db.php";
session_start();

function isAuthorized(): bool
{
    return isset($_SESSION['userId']);
}

function secure(bool $isAuthorizedContext = true) {
    $isAuthorized = isAuthorized();

    if (!$isAuthorized) authWithToken();

    if ($isAuthorizedContext && !$isAuthorized) header("location: sign-in.php");
    else if (!$isAuthorizedContext && $isAuthorized) header("location: /");
}


function getUserId() {
    return $_SESSION['userId'];
}

function logOut() {
    unset($_SESSION['userId']);
}

function authWithToken() {
    if (isset($_COOKIE['token'])) {

    }
}