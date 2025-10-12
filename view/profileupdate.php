<?php
require_once('../model/userModel.php');
session_start();
$username = $_SESSION['username'] ?? $_GET['username'];
$usertype = getUserType($username);
$user = getUser($username);


if (isset($_REQUEST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];

    $isUpdated = updateUser($username, $fullname, $email, $phone, $dob, $password);

    if ($isUpdated) {
        header('location: message.html');
        //echo "Profile updated successfully.";
    } else {
        echo "Error updating profile.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
    <link rel="stylesheet" type="text/css" href="../asset/CSS/updateprofile.css">
</head>

<body>

<header>
    <div class="logo-container">
        <img src="../asset/images/mainLogo.png" alt="Company Logo">
        <span class="company-name">TicketTracker © 2025 Zihadul</span>
    </div>
    <div class="header-buttons">
    <?php if ($usertype == 'admin') { ?>
        <a href="./adminMenu.php" class="back-link">Back</a>
    <?php } elseif ($usertype == 'operator') { ?>
        <a href="./Operator_menu.php" class="back-link">Back</a>
    <?php } elseif ($usertype == 'traveller') { ?>
        <a href="./Traveller_menu.php" class="back-link">Back</a>
    <?php } ?>
            
            <a href="../controller/logout.php">Logout</a>
    </div>
</header>

<h2>Profile Information</h2>

<form method="POST" action="">
    <fieldset>
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" value="<?= $user['username'] ?>" readonly></td>
            </tr>
            <tr>
                <td>Full Name:</td>
                <td>
                    <input type="text" id="fullname" name="fullname"  value="<?= $user['fullname'] ?>"onkeyup="check_fullname()">
                    <p id="fullname_val" style="display:none; color: red;"></p>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="email" id="email" name="email" value="<?= $user['email'] ?>" onkeyup="check_email()">
                    <p id="email_val" style="display:none; color: red;"></p>
                </td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td>
                    <input type="text" id="phone" name="phone" value="<?= $user['phone'] ?>" onkeyup="check_phone()">
                    <p id="phone_val" style="display:none; color: red;"></p>
                </td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td>
                    <input type="date" id="dob" name="dob" value="<?= $user['dob'] ?>" onkeyup="check_dob()">
                    <p id="dob_val" style="display:none; color: red;"></p>
                </td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><input type="password" id="password" name="password" value="<?= $user['password'] ?>"onkeyup="check_password()">
                <p id="password_val" style="display:none;color: red;"></p></td>
            </tr>
            <tr>
                <td  colspan="2" align="center">
                    <input type="submit" name="submit" value="Update Profile">
                </td>
            </tr>
        </table>
    </fieldset>
</form>

<footer>
        &copy; 2025 TicketTracker. All rights reserved. Zihadul
    </footer>
    <script src="../asset/JS/profileupdate.js"></script>
</body>
</html>

