<?php 
    session_start();
    require('../model/userModel.php');
    require('../model/notificationModel.php');
    if (isset($_POST['signupData'])) {
        $inputData = json_decode($_POST['signupData'], true);

        $username = strtolower(trim($inputData['username']));
        $fullname = trim($inputData['fullname']);
        $email = trim($inputData['email']);
        $phone = trim($inputData['phone']);
        $dob = trim($inputData['dob']);
        $password = trim($inputData['password']);
        $type = trim($inputData['type']);
        $security_question = trim($inputData['security_question']);
        $security_answer = strtolower(trim($inputData['security_answer']));
        $approval = 0;
    
        $errors = [];
    
        if (checkUserExists($email, $username)) {
            $errors[] = "Username or email already exists. Please choose a different one.";
        }
    
        if (empty($errors)) {
            if($type=='admin' ||$type=='operator')
            {
            $status = addUser($username, $fullname, $password, $email, $phone, $dob, $security_question, $security_answer, $type, $approval);
            $response = [];
    
            if ($status) {
                $message = "$username just registered and is waiting for approval.";
                $status1 = addRegistrationNotification($message);
    
                if ($status1) {
                    $response['success'] = true;
                    $response['message'] = "Registration successful, awaiting approval." ;
                } else {
                    $response['success'] = false;
                    $response['message'] = "Registration successful but notification failed.";
                }
            } else {
                $response['success'] = false;
                $response['message'] = "Failed to create account. Please try again.";
            }
        }
        elseif($type=='traveller')
            {
            $approval=1;
            $status = addUser($username, $fullname, $password, $email, $phone, $dob, $security_question, $security_answer, $type, $approval);
            $response = [];
    
            if ($status) {
                $message = "$username just registered as a traveller";
                $status1 = addRegistrationNotification($message);
    
                if ($status1) {
                    $response['success'] = true;
                    $response['message'] = "Registration successful." ;
                } else {
                    $response['success'] = false;
                    $response['message'] = "Registration successful but notification failed.";
                }
            } else {
                $response['success'] = false;
                $response['message'] = "Failed to create account. Please try again.";
            }

        }

    } else {
        $response['success'] = false;
        $response['message'] = join(' ', $errors);
    }

    echo json_encode($response);
    exit();
    }
    



    if (isset($_REQUEST['submit'])) {
        if (isset($_REQUEST['username']) && isset($_REQUEST['fullname']) && isset($_REQUEST['password']) && isset($_REQUEST['confirmpassword']) && isset($_REQUEST['email']) && isset($_REQUEST['phone']) && isset($_REQUEST['dob']) && isset($_REQUEST['security_question']) && isset($_REQUEST['security_answer']) && isset($_REQUEST['type']))
        {
            $username = strtolower(trim($_REQUEST['username']));
            $full_name = trim($_REQUEST['fullname']);
            $password = trim($_REQUEST['password']);
            $confirm_pass = trim($_REQUEST['confirmpassword']);
            $email = trim($_REQUEST['email']);
            $phoneno = $_REQUEST['phone'];
            $dob = $_REQUEST['dob'];
            $security_question = $_REQUEST['security_question'];
            $security_answer = strtolower(trim($_REQUEST['security_answer']));
            $type = trim($_REQUEST['type']);
            $approval =1;
            

            $usernameconfirm = $emailconfirm = $phone_confirm = $pass_confirm = null;
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
                $errors[] = "Fullname cannot be empty";
            }
            elseif (strlen($full_name) < 3 || strlen($full_name) > 100) {
                $errors[] = "Full name must be between 3 and 100 characters long.";
            }

            else {
                $full_name_confirm = $full_name;
            }

            if (empty($email)) {
                $errors[] = "Email cannot be empty.";
            } else {
                $atfound = false;
                $dotfound = false;
                $flag = 0;

                for ($i = 0; $i < strlen($email); $i++) {
                    $char = $email[$i];
                    if ($char == '@') {
                        if ($atfound) {
                            $flag = 1;
                        }
                        $atfound = true;
                    } elseif ($char == '.') {
                        if ($dotfound) {
                            $flag = 1;
                        }
                        $dotfound = true;
                    }
                }

                if (!$atfound || !$dotfound || $flag) {
                    $errors[] = "Invalid email format.";
                } else {
                    $emailconfirm = $email;
                }
            }


            if (empty($password) || empty($confirm_pass)) {
                $errors[] = "Password and confirm password fields cannot be empty.";
            } else {
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

            if (!empty($dob)) {
                $dobDate = new DateTime($dob);
                $currentDate = new DateTime();

                $age = $currentDate->diff($dobDate)->y;

                if ($age >= 13) {
                    $dobconfirm=$dob;
                }
                
                else {
                    $errors[] = "You must be at least 13 years old to register. You are only $age years old.";
                }
            }
            else{
                $errors[] = "Date of birth cannot be empty.";
            }
            if (empty($security_question)) {
                $errors[] = "Security question cannot be empty.";
            }

            if (empty($security_answer)) {
                $errors[] = "Security answer cannot be empty.";
            }

            if (empty($type)) {
                $errors[] = "User type must be selected";
            }



            if (empty($errors)) 
            {
                if (checkUserExists($email, $username)) {
                    $errors[] = "Username or email already exists. Please choose a different one.";
                } else {

                    if($type=="operator" || $type== "admin") 
                    {
                        $approval=0;
                        $status = addUser($usernameconfirm,
                                            $full_name_confirm,
                                            $pass_confirm,
                                            $emailconfirm,
                                            $phone_confirm,
                                            $dobconfirm,
                                            $security_question,
                                            $security_answer,
                                            $type,
                                            $approval);
                        if ($status) {
                            $message="$usernameconfirm just registered and waiting for your approval";
                            $status1= addRegistrationNotification($message);

                            if($status1)
                            {
                                header('location: ../view/login.html');
                            }
                            else{
                                echo "Registration Confirmed But notification Error";
                            }
                        } else {
                            $errors[] = "Failed to create account. Please try again.";
                        }
                    } 
                    else  
                    {
                        $status = addUser($usernameconfirm,
                                        $full_name_confirm,
                                        $pass_confirm,
                                        $emailconfirm,
                                        $phone_confirm,
                                        $dobconfirm,
                                        $security_question,
                                        $security_answer,
                                        $type,
                                        $approval);
                                if ($status) {
                                    $message="$usernameconfirm just registered as A Traveller";
                                    $status1= addRegistrationNotification($message);
                                    if($status1)
                                        {
                                        header('location: ../view/login.html');
                                        }
                                else{
                                echo "Registration Confirmed But notification Error";
                                    }
                            } 
                        else {
                            $errors[] = "Failed to create account. Please try again.";
                            }
                    }
                }
            }

            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
            }
        }
        else{
            header('location: ../view/signup.html');
        }
    } else {
        header('location: ../view/signup.html');
        exit();
    }
?>
