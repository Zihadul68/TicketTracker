<?php
session_start();
require_once('../model/userModel.php');

if(isset($_POST['loginData'])){
    $data = json_decode($_POST['loginData'], true);
    $username = strtolower(trim($data['username']));
    $password = trim($data['password']);
    $response = [];

    if(empty($username) || empty($password)){
        $response['success'] = false;
        $response['message'] = "Username and password are required!";
        echo json_encode($response);
        exit();
    }

    if(login($username, $password)){
        $usertype = getUserType($username);

        if(($usertype === 'admin' || $usertype === 'operator') && !getapprovalstatus($username)){
            $response['success'] = false;
            $response['message'] = "You are not approved by the admin yet.";
            echo json_encode($response);
            exit();
        }

        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = $usertype;
        $_SESSION['last_activity'] = time(); // session last activity

        // Set 5-min cookie for session tracking (non-sensitive)
        setcookie('status', 'true', time() + 300, '/');

        $response['success'] = true;
        $response['message'] = "Login successful!";
        $response['usertype'] = $usertype;
        echo json_encode($response);
        exit();
    } else {
        $response['success'] = false;
        $response['message'] = "Invalid username or password.";
        echo json_encode($response);
        exit();
    }
} else {
    header('Location: ../view/login.html');
    exit();
}
?>
