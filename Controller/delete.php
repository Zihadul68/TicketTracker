<?php
session_start();
require_once('../model/userModel.php');

if (!isset($_COOKIE['status'])) {
    header('location: login.html');
    exit;
}


$data = json_decode($_REQUEST['deletedata'], true);
$username = $data['username'] ?? null;

if ($username) {
    $status = deleteUser($username);
    if ($status) {
        $response = ['success' => true, 'message' => 'User deleted successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Failed to delete user'];
    }
} else {
    $response = ['success' => false, 'message' => 'Invalid request'];
}

echo json_encode($response);
?>