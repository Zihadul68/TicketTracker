<?php
session_start();
require_once('../model/db.php');

if (!isset($_SESSION['username'])) {
    echo json_encode([]);
    exit;
}

$username = $_SESSION['username'];
$search = isset($_POST['search']) ? trim($_POST['search']) : '';

if (!empty($search)) {
    $earnings = searchEarnings($username, $search);
    
} else {
    $earnings = getEarningSummary($username);
}

//header('Content-Type: application/json');
echo json_encode($earnings);
?>
