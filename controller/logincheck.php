<?php
session_start();
require_once('../model/userModel.php');

if (isset($_POST['loginData'])) {
    
    $data = json_decode($_POST['loginData'], true);
    $username = strtolower(trim($data['username']));
    $password = trim($data['password']);
    $response = [];

    if ($username === "" || $password === "") {
        echo json_encode(['success' => false, 'message' => 'Username and password are required!']);
        exit();
    }

    $status = login($username, $password);

    if ($status) {
        $usertype = getUserType($username);

        if (($usertype === 'admin' || $usertype === 'operator') && !getapprovalstatus($username)) {
            echo json_encode(['success' => false, 'message' => 'You are not approved by the admin yet.']);
            exit();
        }

        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = $usertype;
        setcookie('status', 'true', time() + 3600, '/');

        echo json_encode([
            'success' => true,
            'message' => 'Login successful!',
            'usertype' => $usertype
        ]);
        exit();
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
        exit();
    }
}


if (isset($_REQUEST['submit'])) {
    $username = strtolower(trim($_REQUEST['username']));
    $password = trim($_REQUEST['password']);

    if ($username == null || empty($password)) {
        echo "Null username/password";
        exit();
    }

    $status = login($username, $password);

    if ($status) {
        $usertype = getUserType($username);
        setcookie('status', 'true', time() + 3600, '/');
        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = $usertype;

        if ($usertype == 'traveller') {
            header('location: ../view/Traveller_menu.php');
        } elseif ($usertype == 'admin') {
            if (getapprovalstatus($username)) {
                header('location: ../view/adminMenu.php');
            } else {
                echo "You are not approved by the admin yet";
            }
        } elseif ($usertype == 'operator') {
            if (getapprovalstatus($username)) {
                header('location: ../view/Operator_menu.php');
            } else {
                echo "You are not approved by the admin yet";
            }
        }
    } else {
        echo "User Not Registered";
    }
    exit();
}


header('location: ../view/login.html');
exit();
?>
