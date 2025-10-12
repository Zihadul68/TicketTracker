<?php
session_start();
require_once('../model/userModel.php');
require_once('../model/notificationModel.php');
if (!isset($_COOKIE['status'])) {
    header('location: login.html');
    exit;
}
$username = $_SESSION['username'];
$totalUsers = getTotalUsers();
$totalTraveller = getTotalTravellers();
$totalAdmin = getTotalAdmins();
$totalOperator = getTotalOperators();
$totalAwaitedUsers = getTotalUnapprovedUsers();
$totalnotifications = getTotalUnreadNotifications($username);
?>

<!DOCTYPE html>
<head>
<link rel="stylesheet" href="../asset/CSS/admin_menu.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome <?= $username ?></h1>

    <div class="dashboard-container">

        <div class="dashboard">
            <table>
                <tr>
                    <th colspan="2">Dashboard</th>
                </tr>
                <tr>
                    <td>Total Users</td>
                    <td><?= $totalUsers ?> Users</td>
                </tr>
                <tr>
                    <td>Total Number of Admins</td>
                    <td><?= $totalAdmin ?> Admins</td>
                </tr>
                <tr>
                    <td>Total Number of Operators</td>
                    <td><?= $totalOperator ?> Operators</td>
                </tr>
                <tr>
                    <td>Total Number of Travellers</td>
                    <td><?= $totalTraveller ?> Travellers</td>
                </tr>
                <tr>
                    <td>Users Waiting for Approval</td>
                    <td><a href="approveUser.php"><?= $totalAwaitedUsers ?></a> Users</td>
                </tr>
                <tr>
                    <td>Total Unread Notifications</td>
                    <td><a href="unreadNotifications.php"><?= $totalnotifications ?></a></td>
                </tr>
            </table>
        </div>

 
        <div class="actions">
            <h2>Admin Actions</h2>
            <a href="userlist.php">View All Users</a>
            <a href="approveUser.php">Approve Users</a>
            <a href="insertfaq.php">Insert FAQ</a>

            <a href="unreadNotifications.php">Notifications</a>
            <a href="./profileupdate.php">Update Profile</a>
            <a href="../controller/logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
