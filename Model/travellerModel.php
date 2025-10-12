<?php
function getConnection(){
    $con = mysqli_connect('127.0.0.1', 'root', '', 'tickettracker');
    return $con;
}
function addSeatinfo($ticket_quantity, $ticket_price, $seat_numbers){
    $con = getConnection();
    $seat_numbers_str = implode(',', $seat_numbers);
    $sql = "INSERT INTO seat (ticket_quantity, ticket_price, seat_numbers) VALUES ('{$ticket_quantity}', '{$ticket_price}', '{$seat_numbers_str}')";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}


function contract($email, $comment){
    $con = getConnection();
    $sql = "insert into review VALUES('{$email}', '{$comment}')";
    if(mysqli_query($con, $sql)){
        return true;
    } else{
        return false;
    }
}

 
?>