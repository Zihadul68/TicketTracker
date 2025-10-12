<?php
    session_start();
    require_once('../model/userModel.php');

    if (!isset($_COOKIE['status'])) {
        header('location: login.html');

    }


    if (isset($_REQUEST['approvedata'])) {
        $data = json_decode($_REQUEST['approvedata'], true);
        $username = $data['username'] ?? null;
    
        if ($username) {
            $status = approveUser($username);
            if ($status) {
                $response = ['success' => true, 'message' => 'User Approved successfully'];
            } else {
                $response = ['success' => false, 'message' => 'Failed to approve user'];
            }
        } else {
            $response = ['success' => false, 'message' => 'Invalid request'];
        }
        echo json_encode($response);
        exit;
    }


    if (isset($_POST['filterData'])) {
        $filterData = json_decode($_POST['filterData'], true);
        $userTypeFilter = isset($filterData['user_type']) ? $filterData['user_type'] : null;
    
        $users = getWaitedUser($userTypeFilter);  
    
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
                        <button onclick=\"approveUser('{$user['username']}')\">Approve</button> |
                        <button id='reject' onclick=\"rejectUser('{$user['username']}')\">Reject</button>
                    </td>
                  </tr>";
        }
        exit;
    }
    ?>