<?php
include 'config.php';

$sql = "SELECT * FROM availablebus ORDER BY time ASC";
$result = $conn->query($sql);

if (!$result) {
    die("Query error: " . $conn->error);
}

if($result->num_rows > 0){
    echo "<h3>Available buses</h3>";
    echo "<ul>";
    while($row = $result->fetch_assoc()){
        echo "<li>" . htmlspecialchars($row['time']) . " — " 
             . htmlspecialchars($row['bustype']) . " —" 
             . htmlspecialchars($row['price']) . "Tk</li>";
    }
    echo "</ul>";
} else {
    echo "No buses available.";
}
?>
