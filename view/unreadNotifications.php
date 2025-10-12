<?php
session_start();
require_once('../model/notificationModel.php');
require_once('../model/userModel.php');

if (!isset($_COOKIE['status'])) {
    header('location: login.html');
    exit;
}

$username = $_SESSION['username'];
$usertype = getUserType($username);
$notifications = getUnreadNotifications($username);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../asset/CSS/unreadNotifications.css">
    <script src="../asset/JS/notification.js" defer></script>
    <title>Unread Notifications</title>
</head>
<body>

    <div class="logout-link">
        <a href="../controller/logout.php">Logout</a>
    </div>

    <h2>Unread Notifications</h2>

    <?php if ($usertype == 'admin') { ?>
        <a href="./adminMenu.php" class="back-link">Back to Admin Menu</a>
    <?php } elseif ($usertype == 'operator') { ?>
        <a href="./Operator_menu.php" class="back-link">Back to Operator Menu</a>
    <?php } elseif ($usertype == 'traveller') { ?>
        <a href="./Traveller_menu.php" class="back-link">Back to Traveller Menu</a>
    <?php } ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Message</th>
                <th>Type</th>
                <th>Status</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="notification_table_body">
            <?php if (!empty($notifications)) { ?>
                <?php foreach ($notifications as $notification) { ?>
                    <tr id="notification-<?php echo $notification['id']; ?>">
                        <td><?php echo $notification['id']; ?></td>
                        <td><?php echo $notification['message']; ?></td>
                        <td><?php echo $notification['type']; ?></td>
                        <td><?php echo $notification['status']; ?></td>
                        <td><?php echo $notification['time']; ?></td>
                        <td>
                            <button id="mark-<?php echo $notification['id']; ?>" onclick="markAsRead(<?php echo $notification['id']; ?>)">Mark as Read</button>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="6" align="center">No Unread Notifications</td>
                </tr>
            <?php } ?>

            <tr>
                <td colspan="6" align="center">
                    <button onclick="viewAllNotifications()">View All Notifications</button>
                </td>
            </tr>
        </tbody>
    </table>

    <div id="notificationContainer"></div>

</body>
</html>
