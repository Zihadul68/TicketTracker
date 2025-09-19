<?php
session_start();
require_once('../model/userModel.php');

if (!isset($_COOKIE['status'])) {
    header('Location: login.html');
    exit();
}

$username = $_SESSION['username'];
$totalUsers = getTotalUsers();
$totalAdmin = getTotalAdmins();
$totalOperator = getTotalOperators();
$totalTraveller = getTotalTravellers();
$totalAwaitedUsers = getTotalUnapprovedUsers();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../asset/css/admin_menu.css">
</head>
<body>
<h1>Welcome <?= htmlspecialchars($username) ?></h1>
<div class="dashboard-container">
    <div class="dashboard">
        <table>
            <tr><th colspan="2">Dashboard</th></tr>
            <tr><td>Total Users</td><td><?= $totalUsers ?> Users</td></tr>
            <tr><td>Total Admins</td><td><?= $totalAdmin ?> Admins</td></tr>
            <tr><td>Total Operators</td><td><?= $totalOperator ?> Operators</td></tr>
            <tr><td>Total Travellers</td><td><?= $totalTraveller ?> Travellers</td></tr>
            <tr><td>Users Waiting Approval</td><td><?= $totalAwaitedUsers ?> Users</td></tr>
        </table>
    </div>
    <div class="actions">
        <h2>Admin Actions</h2>
        <a href="userlist.php">View Users</a>
        <a href="approveUser.php">Approve Users</a>
        <a href="insertfaq.php">Insert FAQ</a>
        <a href="offers.php">Insert Offers</a>
        <a href="../controller/logout.php">Logout</a>
    </div>
</div>
</body>
</html>
