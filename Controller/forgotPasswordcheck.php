<?php 
    session_start();
    require_once('../model/userModel.php');


    if (isset($_REQUEST['recover'])) {
        

        $email = trim($_REQUEST['email_recover']);
        $security_question = trim($_REQUEST['security_question_recover']);
        $security_answer = trim($_REQUEST['security_answer_recover']);

        
        if (empty($email) || empty($security_answer) || empty($security_question)) {
            echo "All credentials are needed"; 
        } else {
        
            $status = checkSecurityQuestion($email, $security_question, $security_answer);
            if ($status) {
                $_SESSION['email'] = $email;
                header('location: ../view/recover_password.html');
                exit; 
            } else {
                echo "Invalid security question or answer."; 
            }
        }
    }
?>