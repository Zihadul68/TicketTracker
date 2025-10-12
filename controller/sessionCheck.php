<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_COOKIE['status'])) {
    header('Location: ../view/login.html');
    exit();
}


if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
    session_unset();
    session_destroy();
    setcookie('status', 'true', time()-10, '/');
    header('Location: ../view/login.html');
    exit();
}


$_SESSION['last_activity'] = time();
?>
