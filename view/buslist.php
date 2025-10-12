<?php
session_start();
require_once('../model/db.php'); 
$username = $_SESSION['username'];
$buses = getAllBuses($username);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Buses</title>
    <link rel="stylesheet" href="../asset/CSS/managebuses.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="../asset/images/mainLogo.png" alt="TicketTracker Logo">
            <span>TicketTrack</span>
        </div>
        <div class="header-buttons">
            <a href="Operator_menu.php">Back</a>
            <a href="../controller/logout.php">Logout</a>
        </div>
    </header>

    <main>
        <h2>Manage Bus Details</h2>
        <div class="search-bar">
            <input type="text" placeholder="Search..." id="searchBox">
            <button onclick="searchBus()">Search</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Bus ID</th>
                    <th>Bus Type</th>
                    <th>Start Location</th>
                    <th>End Location</th>
                    <th>Total Seats</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Price Per Seat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($buses)): ?>
                    <?php foreach ($buses as $bus): ?>
                        <tr>
                            <td><?= $bus['busId'] ?></td>
                            <td><?= $bus['busType'] ?></td>
                            <td><?= $bus['startLocation'] ?></td>
                            <td><?= $bus['endLocation'] ?></td>
                            <td><?= $bus['totalSeats'] ?></td>
                            <td><?= $bus['startTime'] ?></td>
                            <td><?= $bus['endTime'] ?></td>
                            <td><?= $bus['pricePerSeat'] ?></td>
                            <td>
                                <a href="updatebus.php?busId=<?= $bus['busId'] ?>">Update</a> |
                                <a href="../controller/deletebus.php?busId=<?= $bus['busId'] ?>" onclick="return confirm('Are you sure?');">Remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" align="center">No bus data available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
    <footer>
        &copy; 2025 TicketTrack. All rights reserved.
    </footer>
    <script src="../asset/JS/searchBus.js"></script>
</body>
</html>
