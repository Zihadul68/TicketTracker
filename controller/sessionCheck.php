<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_COOKIE['status'])) {
    header('Location: ../view/login.html');
    exit();
}

// 5-minute inactivity check
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
    session_unset();
    session_destroy();
    setcookie('status', 'true', time()-10, '/');
    header('Location: ../view/login.html');
    exit();
}

// Update last activity
$_SESSION['last_activity'] = time();
?>
