<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: view/login.html');
    exit();
} else {
    echo "Welcome, " . $_SESSION['username'] . " (" . $_SESSION['role'] . ")";
}
?>

