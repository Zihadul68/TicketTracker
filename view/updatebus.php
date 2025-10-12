<?php
require_once('../model/db.php'); 

if (isset($_GET['busId'])) {
    $busId = $_GET['busId'];
    $bus = getBus($busId);
} else {
    echo "No bus ID specified.";
    exit;
}

if(isset($_REQUEST['submit'])){
    $busId = $_POST['busId'];
    $busType = $_POST['busType'];
    $startLocation = $_POST['startLocation'];
    $endLocation = $_POST['endLocation'];
    $totalSeats = $_POST['totalSeats'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $pricePerSeat = $_POST['pricePerSeat'];

    $isUpdated = updateBus($busId, $busType, $startLocation, $endLocation, $totalSeats, 
                        $startTime, $endTime, $pricePerSeat);
    if ($isUpdated) {
        header("Location: buslist.php"); 
        exit;
    } else {
        echo "Error updating bus details.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Bus Details</title>
    <link rel="stylesheet" href="../asset/CSS/updatebus.css">
</head>
<body>
    <header>
        <div class="header-content">
            <h1>TicketTrack</h1>
            <div class="header-buttons">
                <a href="buslist.php" class="back-button">Back</a>
                <a href="../controller/logout.php">Logout</a>
            </div>
        </div>
    </header>
    <main>
        <form method="POST" action="" class="form-container">
            <fieldset>
                <legend>Update Bus Details</legend>
                <div class="form-row">
                    <label for="busId">Bus ID:</label>
                    <input type="text" id="busId" name="busId" value="<?php echo $bus['busId']; ?>" readonly>
                </div>
                <div class="form-row">
                    <label for="busType">Bus Type:</label>
                    <select id="busType" name="busType" onkeyup="check_busType()">
                        <option value="ac" <?php echo ($bus['busType'] == 'ac') ? 'selected' : ''; ?>>AC</option>
                        <option value="nonAc" <?php echo ($bus['busType'] == 'nonAc') ? 'selected' : ''; ?>>Non-AC</option>
                        <option value="Sleeper" <?php echo ($bus['busType'] == 'Sleeper') ? 'selected' : ''; ?>>Sleeper</option>
                        <option value="Seater" <?php echo ($bus['busType'] == 'Seater') ? 'selected' : ''; ?>>Seater</option>
                    </select>
                    <p id="busType_val" style="display:none;color: red;">Bus Type cannot be null</p>
                </div>
                <div class="form-row">
                <label for="startLocation">Start Location:</label>
                <div class="input-container">
                    <input type="text" id="startLocation" name="startLocation" value="<?php echo $bus['startLocation']; ?>" onkeyup="check_startLocation()">
                    <p id="startLocation_val" style="display:none; color: red;">Start Location cannot be null</p>
                </div>
            </div>

                <div class="form-row">
                    <label for="endLocation">End Location:</label>
                    <div class="input-container">
                        <input type="text" id="endLocation" name="endLocation" value="<?php echo $bus['endLocation']; ?>"onkeyup="check_endLocation()">
                        <p id="endLocation_val" style="display:none;color: red;">End Location cannot be null</p>
                    </div>
                </div>
                <div class="form-row">
                    <label for="totalSeats">Total Seats:</label>
                    <div class="input-container">
                        <input type="number" id="totalSeats" name="totalSeats" value="<?php echo $bus['totalSeats']; ?>"onkeyup="check_totalSeats()">
                       <p id="totalSeats_val" style="display:none;color: red;">Total Seats cannot be null</p>
                    </div>
                </div>
                <div class="form-row">
                    <label for="startTime">Start Time:</label>
                    <div class="input-container">
                        <input type="time" id="startTime" name="startTime" value="<?php echo $bus['startTime']; ?>"onkeyup="check_startTime()">
                        <p id="startTime_val" style="display:none;color: red;">Start Time cannot be null</p>
                    </div>
                </div>
                <div class="form-row">
                    <label for="endTime">End Time:</label>
                    <div class="input-container">
                        <input type="time" id="endTime" name="endTime" value="<?php echo $bus['endTime']; ?>"onkeyup="check_endTime()">
                        <p id="endTime_val" style="display:none;color: red;">End Time cannot be null</p>
                    </div>
                </div>
                <div class="form-row">
                    <label for="pricePerSeat">Price Per Seat:</label>
                    <div class="input-container">
                        <input type="number" id="pricePerSeat" name="pricePerSeat" value="<?php echo $bus['pricePerSeat']; ?>" step="0.01"onkeyup="check_pricePerSeat()">
                        <p id="pricePerSeat_val" style="display:none;color: red;">Price Per Seat cannot be empty</p>
                    </div>
                </div>
                <div class="form-actions">
                    <input type="submit" name="submit" value="Update">
                </div>
            </fieldset>
        </form>
    </main>
    <footer>
        &copy; 2025 TicketTrack. All rights reserved.
    </footer>
    <script src="../asset/JS/addbus.js"></script>
</body>
</html>
