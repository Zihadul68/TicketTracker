<?php
require_once('../model/db.php'); 
session_start();
$username=$_SESSION['username'];
$bookingHistory = getBookingHistory($username);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bus Booking History</title>
    <link rel="stylesheet" type="text/css" href="../asset/CSS/history.css">
</head>
<body>

<header>
    <div class="logo-container">
        <img src="../asset/images/mainLogo.png" alt="Company Logo">
        <span class="company-name">TicketTrack</span>
    </div>
    <div class="header-buttons">
            <a href="./Operator_menu.php" class="back-button">Back</a>
            <a href="../controller/logout.php">Logout</a>
    </div>
</header>

<h2>Bus Booking History</h2>

<table>
    <tr>
        <th>Bus ID</th>
        <th>Passenger Name</th>
        <th>Booking Date</th>
        <th>Contact Number</th>
    </tr>
    <?php foreach ($bookingHistory as $booking): ?>
        <tr>
            <td><?= $booking['busId'] ?></td>
            <td><?= $booking['passengerName'] ?></td>
            <td><?= $booking['bookingDate'] ?></td>
            <td><?= $booking['contactNumber'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<footer>
        &copy; 2025 TicketTracker. Zihadul. All rights reserved.
    </footer>

</body>
</html>

