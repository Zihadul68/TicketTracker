<?php 
    session_start();
    require_once('../model/userModel.php');

    if(isset($_REQUEST['update_pass'])){
        $password = trim($_REQUEST['new_password']);
        $confirm_pass = trim($_REQUEST['confirm_new_password']);
        $email= $_SESSION['email'];
        if($password == null || empty($confirm_pass)){
            echo "All fields need to be entered";
        }else{
            if (empty($password) || empty($confirm_pass)) {
        $errors[] = "Password and confirm password fields cannot be empty.";
        }
        else {
            $flag = 0;

            if (strlen($password) < 8) {
                $flag = 1;
                $errors[] = "Password must be at least 8 characters long.";
            }

            $uppercase_found = $lowercase_found = $number_found = false;

            for ($i = 0; $i < strlen($password); $i++) {
                $char = $password[$i];
                if (ctype_upper($char)) {
                    $uppercase_found = true;
                } elseif (ctype_lower($char)) {
                    $lowercase_found = true;
                } elseif (ctype_digit($char)) {
                    $number_found = true;
                }
            }

            if (!$uppercase_found) {
                $flag = 1;
                $errors[] = "Password must contain at least one uppercase letter.";
            }
            if (!$lowercase_found) {
                $flag = 1;
                $errors[] = "Password must contain at least one lowercase letter.";
            }
            if (!$number_found) {
                $flag = 1;
                $errors[] = "Password must contain at least one number.";
            }

            if ($password !== $confirm_pass) {
                $flag = 1;
                $errors[] = "Passwords do not match.";
            }

            if ($flag === 0) {
                $pass_confirm = $password;
            }

            if (empty($errors)) {
                $status=recoverpassword($email, $pass_confirm);
                if($status){
                    header('location: ../view/login.html');
                }
                else{
                    echo "Could'nt Update Password. Please Try Again";
                    }
                }
                else {
                    foreach ($errors as $error) {
                        echo $error . "<br>";
                    }
                }

            }
        }
    }
    else{
        //echo "invalid request!";
        header('location: ../view/forgetPassword.html');
    }

?>