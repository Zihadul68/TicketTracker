<?php
    session_start();
    require_once('../model/notificationModel.php');
    if(!isset($_COOKIE['status'])){
        header('location: login.html');  
    }
    $username=$_SESSION['username'];
    $totalnotifications=getTotalUnreadNotifications($username);
?>


<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet"   href="../asset/css/Traveller_menu.css">


</head>
<body>
        <h1>Welcome <?=$username?></h1>    

<!-- 
        <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th colspan="2">Dashboard</th>
        </tr>
        <tr>
            <td>Total Unread Notifications</td>
            <td><a href="unreadNotifications.php"></?php echo $totalnotifications; ?></a></td>
        </tr>
    </table> -->


    <br>

    <h3>Traveller Actions</h3>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th colspan="6">Actions</th>
        </tr>
        <tr>
    <td><a href="searchBuSS.php">Search Bus Route</a></td>
    <td><a href="refund_policy.php">Refund refund_policy</a></td>
    <td><a href="feedback.php">Feedback</a></td>
    <td><a href="viewfaq.php">FAQ</a></td>
    <td><a href="unreadNotifications.php">Notifications</a></td>
    <td><a href="../controller/logout.php">Logout</a></td>

            
        </tr>
    </table>
    <h3>Traveller Action</h3>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th colspan="6">Actions</th>
        </tr>
        <tr>
    <td><a href="home.html">Home</a></td>
   


            
        </tr>
    </table>

</body>
</html>



