<?php
    session_start();
    require_once('../model/notificationModel.php');

    if (!isset($_COOKIE['status'])) {
        header('location: login.html');
        exit;
    }

    if (isset($_POST['id'])) {
        $username = $_SESSION['username'];
        $notification_id = $_POST['id'];

        $status = deleteNotificationForUser($notification_id, $username);

        if ($status) {
            echo json_encode(['success' => true, 'message' => 'Notification deleted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete notification']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request']);
    }
?>