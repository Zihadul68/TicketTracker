<?php
require_once('../model/travellerModel.php');

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);

    if (empty($email) || empty($comment)) {
        echo "Null input";
    } else {
        $atCount = 0;
        $dotCount = 0;
        $atPosition = 0;
        $dotPosition = 0;

       
        for ($i = 0; $i < strlen($email); $i++) {
            $char = $email[$i];

            if ($char == '@') {
                $atCount++;
                $atPosition = $i;
            }

            if ($char == '.') {
                $dotCount++;
                $dotPosition = $i;
            }

            if (($atCount > 1) || 
                ($dotCount > 0 && $dotPosition <= $atPosition + 1) || 
                ($i == 0 && $char == '@') || 
                ($i == strlen($email) - 1 && ($char == '@' || $char == '.'))) {
                echo "Invalid email format.<br>";
                
            }
        }

       
        

        
        if ($atCount == 1 && $dotCount > 0 && $dotPosition > $atPosition) {
            $status = contract($email, $comment);
            if ($status) {

                echo json_encode($email);
                echo json_encode($comment);

              
                echo "Congratulation Submited.";
            } else {
                echo "Comment not added";
            }
        }
    }
} else {
    header('location:contract.html');
}
?>
