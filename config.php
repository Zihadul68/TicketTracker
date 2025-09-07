<?php
$host = "localhost";
$user = "root";       // your MySQL username
$pass = "";           // your MySQL password
$db   = "TicketTracker"; // your database name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Database connected successfully"; // optional test
?>
