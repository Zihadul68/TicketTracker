<?php
session_start();
require_once('../model/userModel.php');

if (!isset($_COOKIE['status'])) {
    header('location: login.html');
    exit;
}
if (isset($_POST['filterData'])) {
    $filterData = json_decode($_POST['filterData'], true);

    $usernameFilter = isset($filterData['username']) ? $filterData['username'] : null;
    $userTypeFilter = isset($filterData['user_type']) ? $filterData['user_type'] : null;

    $users = getApprovedUserFilter($userTypeFilter, $usernameFilter);


    foreach ($users as $user) {
        echo "   <tr>
                <td>{$user['id']}</td>
                <td>{$user['username']}</td>
                <td>{$user['fullname']}</td>
                <td>{$user['email']}</td>
                <td>{$user['phone']}</td>
                <td>{$user['dob']}</td>
                <td>{$user['user_type']}</td>
                <td>
                    <button onclick=\"editUser('{$user['username']}')\">EDIT</button> |
                    <button onclick=\"deleteUser('{$user['username']}')\">DELETE</button>
                </td>
              </tr>";
    }
}
?>
