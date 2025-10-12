<?php

    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'tickettracker');
        return $con;
    }









    function SearchBusRoute($Pickup_Location, $Destination_location, $Bus_Class){
        $con = getConnection();
        $sql = "insert into search_Bus_route VALUES('{$Pickup_Location}', '{$Destination_location}', '{$Bus_Class}')";
        if(mysqli_query($con, $sql)){
            return true;
        } else{
            return false;
        }
    }
   









    function Refunds($refund_policy, $amount, $deduct_percentage,$refund_amount){
        $con = getConnection();
        $sql = "insert into refunds VALUES('{$refund_policy}', '{$amount}', '{$deduct_percentage}','{$refund_amount}')";
        if(mysqli_query($con, $sql)){
            return true;
        } else{
            return false;
        }
    }



    function Feedback($rate_service, $like_service, $suggestion){
        $con = getConnection();
        $sql = "insert into feedback VALUES('{$rate_service}', '{$like_service}', '{$suggestion}')";
        if(mysqli_query($con, $sql)){
            return true;
        } else{
            return false;
        }
    }

    function getAllBuses() {
        $conn = getConnection();
        $sql = "SELECT * FROM buses ";
        $result = mysqli_query($conn, $sql);
        $buses = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $buses[] = $row;
            }
        }
        return $buses;
    }


?>