<?php


function getConnection() {
    $con = mysqli_connect('127.0.0.1', 'root', '', 'tickettracker');
    return $con;
}



function updateUser($username, $fullname, $email, $phone, $dob, $password) {
    $conn = getConnection(); 
    $sql = "UPDATE user 
            SET fullname = '$fullname', 
                email = '$email', 
                phone = '$phone', 
                dob = '$dob', 
                password = '$password' 
            WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    return $result; 
}



function addBus($busId, $busType, $startLocation, $endLocation, $totalSeats, 
                $startTime, $endTime, $pricePerSeat,$username) {
    $conn = getConnection();
    $sql = "INSERT INTO buses (busId, busType, startLocation, endLocation, totalSeats, 
                                startTime, endTime, pricePerSeat,username) 
            VALUES ('$busId', '$busType', '$startLocation', '$endLocation', '$totalSeats', 
                    '$startTime', '$endTime', '$pricePerSeat','$username')";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }
    else{
        return false;
    }
}
function isBusIdExists($busId)
{
    $conn = getConnection();
    $sql = "SELECT * FROM buses WHERE busId = '{$busId}'";
    $result = mysqli_query($conn, $sql);
    $isExists = false;

    if ($result && mysqli_num_rows($result) > 0) {
        $isExists = true;
    }

    return $isExists;
}



function getAllBuses($username) {
    $conn = getConnection();
    $sql = "SELECT * FROM buses where username='{$username}'";
    $result = mysqli_query($conn, $sql);
    $buses = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $buses[] = $row;
        }
    }
    return $buses;
}
function getbus($busId){
    $con = getConnection();
    $sql = "select * from buses where busId='{$busId}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function updateBus($busId, $busType, $startLocation, $endLocation, $totalSeats, 
                    $startTime, $endTime, $pricePerSeat) {
    $conn = getConnection();
    $sql = "UPDATE buses 
            SET busType = '$busType', 
                startLocation = '$startLocation', 
                endLocation = '$endLocation', 
                totalSeats = '$totalSeats', 
                startTime = '$startTime', 
                endTime = '$endTime', 
                pricePerSeat = '$pricePerSeat' 
            WHERE busId = '$busId'";

    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }
    else{
        return false;
    }
}

function deleteBus($busId) {
    $conn = getConnection();
    $sql = "DELETE FROM buses WHERE busId = '$busId'";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }
    else{
        return false;
    }
}
function getBookingHistory($username)
{
    $conn = getConnection(); 
    $sql = "SELECT busId, passengerName, bookingDate, contactNumber FROM 
            bookings where username='{$username}' ORDER BY bookingDate DESC";
    $result = mysqli_query($conn, $sql);
    $history = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $history[] = $row;
        }
    }
    return $history;
}
function getEarningSummary($username) {
    $conn = getConnection(); 
    $sql = "SELECT date, busId, riders, grossEarnings, commission FROM 
            earnings_summary where username='{$username}' ORDER BY date DESC";
    $result = mysqli_query($conn, $sql);
    $earnings = []; 

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $earnings[] = $row;
        }
    }
    return $earnings;
}

function searchBuses($username, $search)
{
    $conn = getConnection();
    $sql = "SELECT * FROM buses 
            WHERE username='{$username}' AND 
            (busId LIKE '%{$search}%' 
            OR busType LIKE '%{$search}%' 
            OR startLocation LIKE '%{$search}%' 
            OR endLocation LIKE '%{$search}%')
            ORDER BY busId ASC";
    $result = mysqli_query($conn, $sql);
    $buses = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $buses[] = $row;
        }
    }
    return $buses;
}
function searchEarnings($username, $search)
{
    $conn = getConnection();
    $sql = "SELECT date, busId, riders, grossEarnings, commission 
            FROM earnings_summary 
            WHERE username = '{$username}' 
            AND (busId LIKE '%{$search}%' OR date LIKE '%{$search}%')
            ORDER BY date DESC";
    $result = mysqli_query($conn, $sql);
    $earnings = [];

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $earnings[] = $row;
        }
    }

    return $earnings;
}

?>
