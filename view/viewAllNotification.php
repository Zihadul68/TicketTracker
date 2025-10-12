<?php
session_start();
require_once('../model/notificationModel.php');
require_once('../model/userModel.php');

if (!isset($_COOKIE['status'])) {
    header('location: login.html');
    exit();
}

$username = $_SESSION['username'];
$notifications = getAllNotifications($username);
$usertype = getUserType($username);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Notifications</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #4CAF50;
            color: white;
            padding: 12px 15px;
            text-align: center;
        }

        td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .back-link {
            position: fixed;
            font-size: 16px;
            margin-left: 20px;
            font-weight: bold;
            color: #4CAF50;
        }

        .back-link {
            font-size: 16px;
            margin-left: 20px;
            font-weight: bold;
            color: #4CAF50;
        }

        .logout-link {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 16px;
            font-weight: bold;
            color: #4CAF50;
        }

        .logout-link a {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
        }

        .logout-link a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h2>Notification List</h2>    

    <?php if ($usertype == 'admin') { ?>
        <a href="./adminMenu.php" class="back-link">Back to Admin Menu</a>
    <?php } elseif ($usertype == 'operator') { ?>
        <a href="./Operator_menu.php" class="back-link">Back to Operator Menu</a>
    <?php } elseif ($usertype == 'traveller') { ?>
        <a href="./Traveller_menu.php" class="back-link">Back to Traveller Menu</a>
    <?php } ?>
    

    <table>
        <tr>
            <th>ID</th>
            <th>Message</th>
            <th>Type</th>
            <th>Status</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
        <?php if (!empty($notifications)) { ?>

        <?php
        for ($i = 0; $i < count($notifications); $i++) { 
        ?>
        <tr>
            <td><?php echo $notifications[$i]['id']; ?></td>
            <td><?php echo $notifications[$i]['message']; ?></td>
            <td><?php echo $notifications[$i]['type']; ?></td>
            <td><?php echo $notifications[$i]['status']; ?></td>
            <td><?php echo $notifications[$i]['time']; ?></td>
            <td>
                <a href="../controller/deleteNotifications.php?id=<?php echo $notifications[$i]['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
        <?php } else { ?>
                <tr>
                    <td colspan="7" align="center">No Notifications</td>
                </tr>
            <?php } ?>

        
        <tr>
            <td colspan="6" align="center">
                <a href="./unreadNotifications.php">View Unread Notifications</a>
            </td>
        </tr>
    </table>


    <div class="logout-link">
        <a href="../controller/logout.php">Logout</a>
    </div>

</body>
</html>
