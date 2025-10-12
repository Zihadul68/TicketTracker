<?php
session_start();
require_once('../model/notificationModel.php');
require_once('../model/busModel.php');

if (!isset($_COOKIE['status'])) {
    header('location: login.html');
}

$username = $_SESSION['username'];
$totalnotifications = getTotalUnreadNotifications($username);
$totalBus = getTotalBusbyuser($username);
$totalACBus = getTotalACBusbyuser($username);
$totalnonACBus = getTotalnonACBusbyuser($username);
$totalSeater = getTotalSeaterBusbyuser($username);
$totalSleeper = getTotalSleeperBusbyuser($username);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home - TicketTrack</title>
    <link rel="stylesheet" href="../asset/CSS/dashboard.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="../asset/images/mainLogo.png" alt="TicketTracker Logo">
            <h1>TicketTrack</h1>
        </div>
        <nav>
            <ul>
                <li><a href="./addbus.php">Add New Bus</a></li>
                <li><a href="buslist.php">Update Bus Details</a></li>
                <li><a href="./profileupdate.php">Update Profile</a></li>
                <li><a href="./bookinghistory.php">Booking History</a></li>
                <li><a href="./summary.php">Earning Summary</a></li>
                <li><a href="viewfaq.php">FAQ</a></li>
                <li><a href="../controller/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Welcome, <?= $username ?></h2>
        <section class="dashboard">
            <h3>Dashboard</h3>
            <table>
                <tr>
                    <th>Total Buses</th>
                    <td><?= $totalBus ?></td>
                </tr>
                <tr>
                    <th>Total AC Coaches</th>
                    <td><?= $totalACBus ?></td>
                </tr>
                <tr>
                    <th>Total non-AC Coaches</th>
                    <td><?= $totalnonACBus ?></td>
                </tr>
                <tr>
                    <th>Total Seater Coaches</th>
                    <td><?= $totalSeater ?></td>
                </tr>
                <tr>
                    <th>Total Sleeper Coaches</th>
                    <td><?= $totalSleeper ?></td>
                </tr>
            </table>
        </section>
    </main>
    <footer>
        &copy; 2025 TicketTracker. Zihadul. All rights reserved.
    </footer>
</body>
</html>
