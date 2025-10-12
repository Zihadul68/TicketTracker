<?php 
    
    $term = $_POST['term'];
    $con=mysqli_connect('localhost', 'root', '', 'tickettracker');
    $sql = "select * from availablebus where time like '%{$term}%'";
    $result = mysqli_query($con, $sql);

    $users = [];

    while($user = mysqli_fetch_assoc($result)){
        array_push($users, $user);
    }

    echo json_encode($users);

?>
