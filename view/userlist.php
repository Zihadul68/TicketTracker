<?php
session_start();
require_once('../model/userModel.php');
if (!isset($_COOKIE['status'])) {
    header('location: login.html');
    exit;
}

$username_filter = isset($_REQUEST['username']) ? $_REQUEST['username'] : null;
$user_type_filter = isset($_REQUEST['user_type']) ? $_REQUEST['user_type'] : null;
$users = getApprovedUserFilter($user_type_filter, $username_filter);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User List</title>
    <script src="../asset/JS/userlist.js" defer></script>
    <link rel="stylesheet" href="../asset/CSS/userlist.css">
</head>
<body>

    <div class="logout-link">
        <a href="../controller/logout.php">Logout</a>
    </div>


    <div class="back-link">
        <a href="./adminMenu.php">Back to Admin Menu</a>
    </div>

    <div class="approve-link">
    <a href="./approveUser.php">See Unapproved Users</a>
    </div>
    

    <div class="container">
        <h2>User List</h2>    


        <div style="text-align: center; margin-bottom: 20px;">
            <label for="user_type"><strong>User Type:</strong></label>
            <select id="user_type" name="user_type" onchange="searchByUsername()">
                <option value="">All</option>
                <option value="admin">Admin</option>
                <option value="operator">Operator</option>
                <option value="traveller">Traveller</option>
            </select>
        </div>

        <div style="text-align: center;">
            <label for="search_username"><strong>Search by Username:</strong></label>
            <input type="text" id="search_username" placeholder="Type username" onkeyup="searchByUsername()" />
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Date of Birth</th>
                    <th>User Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="user_table_body">
            <?php if (!empty($users)) { ?>

                <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['fullname'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['phone'] ?></td>
                    <td><?= $user['dob'] ?></td>
                    <td><?= $user['user_type'] ?></td>
                    <td>
                        <button onclick="editUser('<?= $user['username'] ?>')">EDIT</button> |
                        <button onclick="deleteUser('<?= $user['username'] ?>')">DELETE</button>
                    </td>
                </tr>
                <?php } ?>
                <?php } else { ?>
                <tr>
                    <td colspan="7" align="center">No Running Offer</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
