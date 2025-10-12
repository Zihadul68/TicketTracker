<?php
require_once('../model/db.php'); 
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.html');
}
$username=$_SESSION['username'];
$earningSummary = getEarningSummary($username);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daily Earning Summary</title>
    <link rel="stylesheet" type="text/css" href="../asset/CSS/summary.css">
</head>
<body>

<header>
    <div class="logo-container">
        <img src="../asset/images/mainLogo.png" alt="Company Logo">
        <span class="company-name">TicketTracker</span>
    </div>
    <div class="header-buttons">
            <a href="./Operator_menu.php" class="back-button">Back</a>
            <a href="../controller/logout.php">Logout</a>
    </div>
</header>

<h2>Daily Earning Summary</h2>

<div align="center" style="margin-bottom: 20px;">
    <input type="text" placeholder="Search..." id="searchBox" onkeyup="searchEarnings()">
    <!-- <button onclick="searchEarnings()">Search</button> -->
</div>

<table>
    <thead>
    <tr>
        <th>Date</th>
        <th>Bus ID</th>
        <th>Riders</th>
        <th>Gross Earnings</th>
        <th>Commission</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($earningSummary as $earning): ?>
        <tr>
            <td><?php echo $earning['date']; ?></td>
            <td><?php echo $earning['busId']; ?></td>
            <td><?php echo $earning['riders']; ?></td>
            <td><?php echo "$" . $earning['grossEarnings']; ?></td>
            <td><?php echo "$" . $earning['commission']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<div>
    <a href="./generatereport.php">Generate Report</a>
</div>

<!-- <script>
    function searchEarnings() {
        let searchValue = document.getElementById("searchBox").value;
        alert("Search functionality is not implemented yet. You searched for: " + searchValue);
    } -->
</script>
<footer>
        &copy; 2025 TicketTrack. All rights reserved.
    </footer>
    <script src="../asset/JS/searchEarning.js"></script>
</body>
</html>

