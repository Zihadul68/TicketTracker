<?php
    session_start();
    require_once('../model/userModel.php');
    if(!isset($_COOKIE['status'])){
        header('location: login.html');  
    }
    $user_type_filter = isset($_GET['user_type']) ? $_GET['user_type'] : null;
    $users = getWaitedUser($user_type_filter);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User List</title>
    <script src="../asset/JS/approve.js" defer></script>
    <link rel="stylesheet" href="../asset/CSS/approveUser.css">
</head>
<body>

    <div class="logout-link">
        <a href="../controller/logout.php">Logout</a>
    </div>

    <div class="back-link">
        <a href="./adminMenu.php">Back to Admin Menu</a>
    </div>


    <div class="container">
        <h2>User List</h2>    


            <div style="text-align: center; margin-bottom: 20px;">
                <strong>Filter by User Type:</strong>
                <select id="user_type" name="user_type" onchange="searchByType()">
                    <option value="">All</option>
                    <option value="admin">Admin</option>
                    <option value="operator">Operator</option>
                </select>
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
                            <button onclick="approveUser('<?= $user['username'] ?>')">Approve</button> |
                            <button id="reject" onclick="rejectUser('<?= $user['username'] ?>')">Reject</button>
                        </td>
                    </tr>
                <?php } ?>
                <?php } else { ?>
                <tr>
                    <td colspan="7" align="center">No Users Waiting for Approval</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
