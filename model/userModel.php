<?php

    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'tickettracker');
        return $con;
    }

    function login($username, $password){
        $con = getConnection();
        $sql = "select * from usertable where username='{$username}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count ==1){
            return true;
        }else{
            return false;
        }
    }

    function addUser($username, $full_name, $password, $email, $phone, $dob, $security_question, $security_answer,$type,$approval): bool {
        $con = getConnection();
        
        $sql = "INSERT INTO usertable VALUES ('', '{$username}', '{$full_name}', '{$email}', '{$phone}', '{$dob}', '{$password}','{$security_question}','{$security_answer}','{$type}','{$approval}')";
        
        if (mysqli_query($con, $sql)) {
            return true;
            }
        else {
            return false;
        }
    }

    function approveUser($username) {
        $con = getConnection();
        $sql = "UPDATE usertable SET is_approved = '1' WHERE username = '{$username}'";
        if (mysqli_query($con, $sql)) {
            return true;
            }
        else {
            return false;
        }
    }

    function recoverpassword($email, $new_password) {
        $con = getConnection();
        $sql = "UPDATE usertable SET password = '{$new_password}' WHERE email = '{$email}'";

        if (mysqli_query($con, $sql)) {
            return true;
            }
        else {
            return false;
        }
    }

    // function updateUser($username, $full_name, $phone, $dob, $current_username): bool {
    //     $con = getConnection();
    
    //     $sql = "UPDATE user 
    //             SET username = '{$username}', 
    //                 fullname = '{$full_name}',
    //                 phone = '{$phone}', 
    //                 dob = '{$dob}' 
    //             WHERE username = '{$current_username}'";
    
    //     if (mysqli_query($con, $sql)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    function checkSecurityQuestion($email, $security_question, $security_answer){
        $con = getConnection();

        $sql = "SELECT * FROM usertable WHERE email = '{$email}' AND security_question = '{$security_question}' AND security_answer = '{$security_answer}'";
        $result = mysqli_query($con, $sql);
        
        if (mysqli_num_rows($result) == 1) {
            return true;
        } else {
            return false;
        }
    }

    

    function checkUserExists($email, $username)
    {
    $con = getConnection();
    $sql = "SELECT * FROM usertable WHERE email ='{$email}' OR username = '{$username}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

        if($count >=1){
            return true;
        }else{
            return false;
        }
    }

    function checkIfUsernameExists($username) {
        $con = getConnection(); 
    
  
        $sql = "SELECT * FROM usertable WHERE username = '{$username}'";
        
        $result = mysqli_query($con, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            return true; 
        }
        return false;
    }

    function checkEmailExists($email)
    {
    $con = getConnection();
    $sql = "SELECT * FROM usertable WHERE email ='{$email}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

        if($count >=1){
            return true;
        }else{
            return false;
        }
    }

    function checkIfValuesExist($username,$full_name, $phone,$dob, $current_username) {
        $con = getConnection();
        
        $sql = "SELECT * FROM usertable WHERE (username = '{$username}' AND username != '{$current_username}')
                OR (fullname = '{$full_name}' AND username != '{$current_username}')
                OR (dob = '{$dob}' AND username != '{$current_username}')
                OR (phone = '{$phone}' AND username != '{$current_username}')";
        
        $result = mysqli_query($con, $sql);
        
        
        if (mysqli_num_rows($result) > 0) {
            return true;
        }
        
        return false;
    }

    function getUser($name){
    $con = getConnection();
    $sql = "SELECT * FROM usertable WHERE username = '{$name}'";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result);
    }

    function getApprovedUserFilter($user_type_filter, $username_filter) {
        $con = getConnection();
        $sql = "SELECT * FROM usertable WHERE is_approved = '1'";

        if ($user_type_filter) {
            $sql .= " AND user_type = '{$user_type_filter}'";
        }

        if ($username_filter) {
            $sql .= " AND username LIKE '%$username_filter%'";
        }

        $result = mysqli_query($con, $sql);
        $users = [];
        while($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
        return $users;
    }

    function getApprovedUserTypeFilter($user_type_filter) {
        $con = getConnection();
        $sql = "SELECT * FROM usertable WHERE is_approved = '1'";

        if ($user_type_filter) {
            $sql .= " AND user_type = '{$user_type_filter}'";
        }
        
        $result = mysqli_query($con, $sql);
        $users = [];
        while($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
        return $users;
    }

    function getAllUser() {
        $con = getConnection();
        $sql = "SELECT * FROM usertable '";
        $result = mysqli_query($con, $sql);
        $users = [];
        while($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
        return $users;
    }

    function getWaitedUser($user_type_filter) {
        $con = getConnection();
        $sql = "SELECT * FROM usertable WHERE is_approved = '0'";

        if ($user_type_filter) {
            $sql .= " AND user_type = '{$user_type_filter}'";
        }
        
        $result = mysqli_query($con, $sql);
        $users = [];
        while($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
        return $users;
    }
    

    function getUserType($username) {
        $con = getConnection();
        $sql = "SELECT user_type FROM usertable WHERE username = '{$username}'";
        $result = mysqli_query($con, $sql);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['user_type']; 
        } else {
            return null; 
        }
    }

    function getapprovalstatus($username) {
        $con = getConnection();
        $sql = "SELECT is_approved FROM usertable WHERE username = '{$username}'";
        $result = mysqli_query($con, $sql);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if($row['is_approved']==1)
            {
                return true;
            }
            else {
            return false; 
            }
        }
    }


    function getTotalUsers() {
        $con = getConnection();
    $sql = "SELECT * FROM usertable ";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    return $count;

    }

    function getTotalUnapprovedUsers() {
    $con = getConnection();
    $sql = "SELECT * FROM usertable WHERE is_approved = '0'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    return $count;

    }

    function getTotalTravellers() {
    $con = getConnection();
    $sql = "SELECT * FROM usertable WHERE user_type = 'traveller'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    return $count;

    }

    function getTotalAdmins() {
    $con = getConnection();
    $sql = "SELECT * FROM usertable WHERE user_type = 'admin'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    
    return $count;
    
    }



    function getTotalOperators() {
    $con = getConnection();
    $sql = "SELECT * FROM usertable WHERE user_type = 'operator'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
        
    return $count;
        
    }

    function deleteUser($current_username) {
        $con = getConnection();
        
        $sql = "DELETE FROM usertable WHERE username = '{$current_username}'";
        
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    function editUser($fullname, $phone, $dob,$current_username) {
        $conn = getConnection(); 
        $sql = "UPDATE usertable 
                SET fullname = '$fullname', 
                    phone = '$phone', 
                    dob = '$dob' 
                WHERE username = '$current_username'";
        if(mysqli_query($conn, $sql))
        {
            return true;
        }
        else{
            return false;
        }
    }

    function updateUser($username, $fullname, $email, $phone, $dob, $password) {
        $conn = getConnection(); 
        $sql = "UPDATE usertable 
                SET fullname = '$fullname', 
                    email = '$email', 
                    phone = '$phone', 
                    dob = '$dob', 
                    password = '$password' 
                WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        return $result; 
    }
?>

