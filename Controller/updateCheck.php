<?php 
    session_start();
    require('../model/userModel.php');
    require('../model/notificationModel.php');
    if (isset($_POST['Data'])) {
        $inputData = json_decode($_POST['Data'], true);
        $username = trim(strtolower($inputData['username']));
        $fullname = trim($inputData['fullname']);
        $phone = trim($inputData['phone']);
        $dob = trim($inputData['dob']);
        
        $errors = [];
    
    
        if (empty($errors)) {
            $status = editUser( $fullname, $phone, $dob,$username);
            $response = [];
    
            if ($status) {
                $response['success'] = true;
                $response['message'] = "Profile Update successful." ;
               
            } else {
                $response['success'] = false;
                $response['message'] = "Failed to Update account. Please try again.";
            }
        }
        else {
        $response['success'] = false;
        $response['message'] = join(' ', $errors);
        }

        echo json_encode($response);
        exit();
    }
    

    if (isset($_REQUEST['update'])) {

        $username = trim($_REQUEST['username_update']);
        $full_name = trim($_REQUEST['fullname_update']);
        $phoneno = $_REQUEST['phone_update'];
        $dob = $_REQUEST['dob_update'];
        $current_username = $_SESSION['current_name']; 
        
        $usernameconfirm = $phone_confirm = $full_name_confirm = null;
        $errors = [];

    
        if (empty($username)) {
            $errors[] = "Username cannot be empty.";
        } elseif (strlen($username) < 2) {
            $errors[] = "Username must be at least 2 characters long.";
        } elseif (!ctype_alpha($username[0])) {
            $errors[] = "The first character of the username must be a letter.";
        } else {
            $flag = 0;
            for ($i = 0; $i < strlen($username); $i++) {
                $char = $username[$i];
                if (!(ctype_alpha($char)) || $char == '.' || $char == ' ') {
                    $flag = 1;
                }
            }
            if ($flag) {
                $errors[] = "Username can only contain letters.";
            } else {
                $usernameconfirm = $username;
            }
        }




        if(empty($full_name)){
            $errors[] = "Full name cannot be empty.";
        } elseif (strlen($full_name) < 3 || strlen($full_name) > 100) {
            $errors[] = "Full name must be between 3 and 100 characters long.";
        } else {
            $full_name_confirm = $full_name;
        }




        if (empty($phoneno)) {
            $errors[] = "Phone number cannot be empty.";
        } else {
            $flag = 0;

            if (strlen($phoneno) != 11) {
                $flag = 1;
                $errors[] = "Phone number must be exactly 11 digits long.";
            }

            $valid_prefixes = ['013', '014', '015', '016', '017', '018', '019'];
            $prefix = substr($phoneno, 0, 3);

            if (!in_array($prefix, $valid_prefixes)) {
                $flag = 1;
                $errors[] = "Phone number must start with a valid Bangladeshi prefix (e.g., 013, 017).";
            }

            if (!ctype_digit($phoneno)) {
                $flag = 1;
                $errors[] = "Phone number must contain only numeric digits.";
            }

            if ($flag === 0) {
                $phone_confirm = $phoneno;
            }
        }




        if (empty($dob)) {
            $errors[] = "Date of birth cannot be empty.";
        }



        if (empty($errors)) {

            $status = editUser( $full_name_confirm, $phone_confirm, $dob,$username);
            if ($status) {
                header('location: ../view/userlist.php');

            } else {
                $errors[] = "Failed to update account. Please try again.";
            }
        }



        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    } else {
        header('location: ../view/userlist.php');
        exit();
    }
?>