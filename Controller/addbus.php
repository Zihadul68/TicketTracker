<?php
require_once('../model/db.php');
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

$username = $_SESSION['username'];


if (isset($_REQUEST['submit'])) {
    //$username= $_REQUEST['username'];
    $busId = $_REQUEST['busId'];
    $busType = $_REQUEST['busType'];
    $startLocation = $_REQUEST['startLocation'];
    $endLocation = $_REQUEST['endLocation'];
    $totalSeats = $_REQUEST['totalSeats'];
    $startTime = $_REQUEST['startTime'];
    $endTime = $_REQUEST['endTime'];
    $pricePerSeat = $_REQUEST['pricePerSeat'];

   
    $errors = [];

    
    if (empty($busId)) {
        $errors[] = "Bus ID is required";
    }
    elseif (!is_numeric($busId) || strlen($busId) != 3) {
        $errors[] = "Bus ID must be a numeric value with exactly 3 digits (e.g., 101, 102)";
    }
    elseif (isBusIdExists($busId)) { 
        $errors[] = "Bus ID already exists. Please use a different ID.";
    }

    
    if (empty($busType)) {
        $errors[] = "Bus Type is required";
    }

   
    if (empty($startLocation) || empty($endLocation)) {
        $errors[] = "Both Start Location and End Location are required";
    }

    if (empty($totalSeats) || $totalSeats <= 0) {
        $errors[] = "Total Seats must be a positive number";
    }

    if (empty($startTime) || empty($endTime)) {
        $errors[] = "Start Time and End Time are required";
    }

    if (empty($pricePerSeat) || $pricePerSeat <= 0) {
        $errors[] = "Price per seat must be a positive number";
    }
    if (empty($errors)) {
     
        $addBus = addBus($busId, $busType, $startLocation, $endLocation, $totalSeats, $startTime, $endTime, $pricePerSeat,$username);

        if ($addBus) {
            echo "New bus record created successfully";
        } else {
            echo "Error: Could not save the bus details";
        }
            } else {

                foreach ($errors as $e) {
            echo "<p>$e</p>";
        }
    }
    echo '<br><a href="../view/addbus.php"><button>Back</button></a>';
}
?>
