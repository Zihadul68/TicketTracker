<?php
session_start();
    if(!isset($_COOKIE['status'])){
      header('location: ./login.html');  
     }
     
require_once('../model/zihaduldb.php'); 
$username = $_SESSION['username'];
$buses = getAllBuses();
?>


<html >
<head>

    <title>Manage Buses</title>
    <link rel="stylesheet" href="../asset/CSS/managebuses.css">
</head>
<body>
    <header>
        <div >
        <p><h3>Available Busses<h3></p>
        </div>
        <div class="header-buttons">
            <a href="searchBuSS.php">Back</a>
            
        </div>
    </header>


   
        <table>
            <thead>
                <tr>
                    <th>Bus ID</th>
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
                            <td><?= $bus['totalSeats'] ?></td>
                            <td><?= $bus['startTime'] ?></td>
                            <td><?= $bus['endTime'] ?></td>
                            <td><?= $bus['pricePerSeat'] ?></td>
                            <td>
                            <a href="booking.php?busId=<?= $bus['busId'] ?>">Book</a> 
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
  
    <script src="../asset/JS/searchBus.js"></script>
</body>
</html>
