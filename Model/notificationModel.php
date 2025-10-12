<?php

    function getConnectionfornotification(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'tickettracker');
        return $con;
    }

    function addRegistrationNotification($message) {
        $con = getConnectionfornotification();
        $type='registration';
            
        $sql = "INSERT INTO notification (message, type, time) VALUES ('{$message}', '{$type}', NOW())";
        if (mysqli_query($con, $sql)) {
            $notification_id = mysqli_insert_id($con);
        
            $sql_admins = "SELECT username FROM usertable WHERE user_type = 'admin'";
            $result = mysqli_query($con, $sql_admins);
        
            while ($admin = mysqli_fetch_assoc($result)) {
                $admin_username = $admin['username'];
        
                $sql_status = "INSERT INTO notification_status (notification_id, username, status, time) 
                                   VALUES ('{$notification_id}', '{$admin_username}', 'unread', NOW())";
                mysqli_query($con, $sql_status);
            }
        
            return true;
        }
        
        return false;
    }

    function addOfferNotification($message) {
        $con = getConnectionfornotification();
        $type='offer';
            
        $sql = "INSERT INTO notification (message, type, time) VALUES ('{$message}', '{$type}', NOW())";
        if (mysqli_query($con, $sql)) {
            $notification_id = mysqli_insert_id($con);
        
            $sql_admins = "SELECT username FROM usertable WHERE user_type = 'traveller'";
            $result = mysqli_query($con, $sql_admins);
        
            while ($admin = mysqli_fetch_assoc($result)) {
                $traveller_username = $admin['username'];
        
                $sql_status = "INSERT INTO notification_status (notification_id, username, status, time) 
                                   VALUES ('{$notification_id}', '{$traveller_username}', 'unread', NOW())";
                mysqli_query($con, $sql_status);
            }
        
            return true;
        }
        
        return false;
    }

    function getUnreadNotifications($username) {
        $con = getConnectionfornotification();
    
        $sql = "SELECT n.id, n.message, n.type, n.time,ns.status
                FROM notification n
                JOIN notification_status ns ON n.id = ns.notification_id
                WHERE ns.username = '{$username}' AND ns.status = 'unread'
                ORDER BY n.time DESC";
    
        $result = mysqli_query($con, $sql);
        $notifications = [];
    
        while ($row = mysqli_fetch_assoc($result)) {
            $notifications[] = $row;
        }
    
        return $notifications;
    }

    function getAllNotifications($username) {
        $con = getConnectionfornotification();
    
        $sql = "SELECT n.id, n.message, n.type, n.time, ns.status
                FROM notification n
                JOIN notification_status ns ON n.id = ns.notification_id
                WHERE ns.username = '{$username}' ORDER BY n.time DESC";
    
        $result = mysqli_query($con, $sql);
        $notifications = [];
    
        while ($row = mysqli_fetch_assoc($result)) {
            $notifications[] = $row;
        }
    
        return $notifications;
    }




    function markNotificationAsRead($notification_id, $username) {
        $con = getConnectionfornotification();
    
        $sql = "UPDATE notification_status 
                SET status = 'read', time = NOW() 
                WHERE notification_id = '{$notification_id}' AND username = '{$username}'";
    
        if(mysqli_query($con, $sql))
        {
            return true;
        }
        else{
            return false;
        }
    }

    function deleteNotificationForUser($notification_id, $username) {
        $con = getConnectionfornotification();
    
        $sql = "
            DELETE FROM notification_status 
            WHERE notification_id = '{$notification_id}' 
            AND username = '{$username}'
        ";
    
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
           return false;
        }
    }

    function getTotalUnreadNotifications($username) {
        $con = getConnectionfornotification();
        $sql = "SELECT * FROM notification_status WHERE username = '{$username}' AND status = 'unread'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        
        return $count;
        
        }

        

?>

