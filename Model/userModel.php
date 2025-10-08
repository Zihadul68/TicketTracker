<?php
function getConnection() {
    $con = mysqli_connect('127.0.0.1', 'root', '', 'tickettracker');
    if (!$con) die("Database connection failed: " . mysqli_connect_error());
    return $con;
}

// Login check
function login($username, $password) {
    $con = getConnection();
    $sql = "SELECT * FROM usertable WHERE username='{$username}' AND password='{$password}'";
    $result = mysqli_query($con, $sql);
    return (mysqli_num_rows($result) === 1);
}

// Get user type
function getUserType($username) {
    $con = getConnection();
    $sql = "SELECT user_type FROM usertable WHERE username='{$username}'";
    $result = mysqli_query($con, $sql);
    if ($row = mysqli_fetch_assoc($result)) return $row['user_type'];
    return null;
}

// Get approval status
function getApprovalStatus($username) {
    $con = getConnection();
    $sql = "SELECT is_approved FROM usertable WHERE username='{$username}'";
    $result = mysqli_query($con, $sql);
    if ($row = mysqli_fetch_assoc($result)) return ($row['is_approved'] == 1);
    return false;
}

// Total counts
function getTotalUsers() {
    $con = getConnection();
    $sql = "SELECT COUNT(*) AS total FROM usertable";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}
function getTotalAdmins() {
    $con = getConnection();
    $sql = "SELECT COUNT(*) AS total FROM usertable WHERE user_type='admin'";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result)['total'];
}
function getTotalOperators() {
    $con = getConnection();
    $sql = "SELECT COUNT(*) AS total FROM usertable WHERE user_type='operator'";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result)['total'];
}
function getTotalTravellers() {
    $con = getConnection();
    $sql = "SELECT COUNT(*) AS total FROM usertable WHERE user_type='traveller'";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result)['total'];
}
function getTotalUnapprovedUsers() {
    $con = getConnection();
    $sql = "SELECT COUNT(*) AS total FROM usertable WHERE is_approved=0";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result)['total'];
}
?>
