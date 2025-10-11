<?php

    function getfaqConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'tickettracker');
        return $con;
    }

    function insertfaq($question,$answer,$type,$user_type)
    {
        $con = getfaqConnection();
        $sql = "INSERT INTO faq VALUES ('','{$question}','{$answer}','{$type}', '{$user_type}')";
        
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    function fetchFAQs() {
        $con = getfaqConnection();
        $sql = "SELECT * FROM faq";
        $result = mysqli_query($con, $sql);
        $faqs=[];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $faqs[] = $row;
            }
            return $faqs;
        } 
    }

    function fetchFAQsbyUsertype($usertype) {
        $con = getfaqConnection();
        $sql = "SELECT * FROM faq WHERE user_type = '{$usertype}' OR user_type = 'both'";
        $result = mysqli_query($con, $sql);
        $faqs=[];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $faqs[] = $row;
            }
            return $faqs;
        } 
    }

    function fetchFAQsbyType($type,$usertype) {
        $con = getfaqConnection();
        $sql = "SELECT * FROM faq WHERE (user_type = 'both' OR user_type = '{$usertype}')";
    
        if (!empty($type)) {
            $sql .= " AND type = '{$type}'";
        }
    
        $result = mysqli_query($con, $sql);
        $users = [];
        while($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
        return $users;
    }

    

    function getQuestion() {
        $con = getfaqConnection();
    }   

    function getAnswer() {
        $con = getfaqConnection();
    } 

    