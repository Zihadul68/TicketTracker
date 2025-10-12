<?php
session_start();
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bus Details</title>
    <link rel="stylesheet" href="../asset/CSS/addbus.css">
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="../asset/images/mainLogo.png" alt="TicketTracker Logo">
                <span>TicketTrack</span>
            </div>
            <div class="header-buttons">
                <a href="./Operator_menu.php" class="back-button">Back</a>
                <a href="../controller/logout.php" class="logout-button">Logout</a>
            </div>
        </div>
    </header>
    <main>
        <form method="post" action="../controller/addbus.php" class="form-container">
            <fieldset>
                <legend>Add Bus Details</legend>
                <div class="form-row">
                    <div class="form-column">
                        <label for="username">Your Username:</label>
                        <span class="static-data"><?= $username ?></span>
                    </div>
                <div class="form-column">
                    <label for="busId">Bus ID:</label>
                    <input type="text" id="busId" name="busId" placeholder="e.g., 101" onkeyup="check_busId()">
                    <p id="bus_val" style="display:none;color: red;">Bus ID cannot be null</p>
                </div>
                </div>
                <div class="form-row">
                    <div class="form-column">
                        <label for="busType">Bus Type:</label>
                        <select id="busType" name="busType" onkeyup="check_busType()">
                            <option value="ac">AC</option>
                            <option value="nonAc">Non-AC</option>
                            <option value="Sleeper">Sleeper</option>
                            <option value="Seater">Seater</option>
                        </select>
                        <p id="busType_val" style="display:none;color: red;">Bus Type cannot be null</p>
                    </div>
                    <div class="form-column">
                        <label for="startLocation">Start Location:</label>
                        <input type="text" id="startLocation" name="startLocation" onkeyup="check_startLocation()">
                        <p id="startLocation_val" style="display:none;color: red;">Start Location cannot be null</p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-column">
                        <label for="endLocation">End Location:</label>
                        <input type="text" id="endLocation" name="endLocation" onkeyup="check_endLocation()">
                        <p id="endLocation_val" style="display:none;color: red;">End Location cannot be null</p>
                    </div>
                    <div class="form-column">
                        <label for="totalSeats">Total Seats:</label>
                        <input type="number" id="totalSeats" name="totalSeats" onkeyup="check_totalSeats()">
                        <p id="totalSeats_val" style="display:none;color: red;">Total Seats cannot be null</p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-column">
                        <label for="startTime">Start Time:</label>
                        <input type="time" id="startTime" name="startTime" onkeyup="check_startTime()">
                        <p id="startTime_val" style="display:none;color: red;">Start Time cannot be null</p>
                    </div>
                    <div class="form-column">
                        <label for="endTime">End Time:</label>
                        <input type="time" id="endTime" name="endTime" onkeyup="check_endTime()">
                        <p id="endTime_val" style="display:none;color: red;">End Time cannot be null</p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-column">
                        <label for="pricePerSeat">Price Per Seat:</label>
                        <input type="number" id="pricePerSeat" name="pricePerSeat" step="0.01" onkeyup="check_pricePerSeat()">
                        <p id="pricePerSeat_val" style="display:none;color: red;">Price Per Seat cannot be empty</p>
                    </div>
                </div>

                </div>
                <div class="form-actions">
                    <input type="submit" name="submit" value="Save">
                </div>
            </fieldset>
        </form>
    </main>
    <footer>
        &copy; 2025 TicketTracker. ZIhadul. All rights reserved.
    </footer>
    <script src="../asset/JS/addbus.js"></script>
</body>
</html>
