<?php
session_start();
require_once('../model/db.php');

$username=$_SESSION['username'];
$buses = getAllBuses($username);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<table border="1" align="center">
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
                            </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" align="center">No bus data available.</td>
                    </tr>
                <?php endif; ?>
</body>
</html>