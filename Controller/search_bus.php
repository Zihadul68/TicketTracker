<?php
session_start();
require_once('../model/db.php');

$username = $_SESSION['username'];
$search = isset($_POST['search']) ? trim($_POST['search']) : '';

if (!empty($search)) {
    $buses = searchBuses($username, $search);

    if (!empty($buses)) {
        foreach ($buses as $bus) {
            echo "
                <tr>
                    <td>{$bus['busId']}</td>
                    <td>{$bus['busType']}</td>
                    <td>{$bus['startLocation']}</td>
                    <td>{$bus['endLocation']}</td>
                    <td>{$bus['totalSeats']}</td>
                    <td>{$bus['startTime']}</td>
                    <td>{$bus['endTime']}</td>
                    <td>{$bus['pricePerSeat']}</td>
                    <td>
                        <a href='updatebus.php?busId={$bus['busId']}'>Update</a> |
                        <a href='../controller/deletebus.php?busId={$bus['busId']}' onclick='return confirm(\"Are you sure?\");'>Remove</a>
                    </td>
                </tr>
            ";
        }
    } else {
        echo "No Bus Found";
    }
} else {
    echo "No Bus Found";
}
?>