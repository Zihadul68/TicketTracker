<?php
    session_start();
    require_once('../model/notificationModel.php');

    if (!isset($_COOKIE['status'])) {
        header('location: login.html');
        exit;
    }

    $username = $_SESSION['username'];

    $notifications = getAllNotifications($username); 

    if ($notifications !== false) {
        echo json_encode(['success' => true, 'notifications' => $notifications]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No notifications found']);
}
?>