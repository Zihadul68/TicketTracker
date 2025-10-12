<?php
session_start();
require_once '../model/travellerModel.php';
 
 
if (!isset($_SESSION['available_seats'])) {
 
    $_SESSION['available_seats'] = 40;
$_SESSION['selected_seats'] = [];
    $_SESSION['total_price'] = 0;
}
 
$seat_price = 500;
 
 
if (isset($_POST['select_seat'])) {
    $seat = $_POST['select_seat'];
 
    if (in_array($seat, $_SESSION['selected_seats'])) {
        echo "This seat is already selecte.";
    }
   
 
    else {
 
        $_SESSION['selected_seats'][] = $seat;
        $_SESSION['available_seats'] = $_SESSION['available_seats'] - 1;
        $_SESSION['total_price'] =$_SESSION['total_price'] + $seat_price;
    }
}
 
 
 
 
 
 
if (isset($_POST['book_seats'])) {
     $ticket_quantity = count($_SESSION['selected_seats']);
    $ticket_price = $_SESSION['total_price'];
    $seat_numbers = $_SESSION['selected_seats'];
 
   
    $booking = addSeatinfo($ticket_quantity, $ticket_price, $seat_numbers);
 
    if ($booking) {
       
        $_SESSION['selected_seats'] = [];
        $_SESSION['total_price'] = 0;
        $_SESSION['available_seats'] = 40;
 
        echo "congratulation.";
    } 
    
    else {
         echo "not booked.";
     }
}
?>
 
<html>
<head>
    <a href="availablebus.html">Find Available bus</a>
    <title>Seat Number</title>
</head>
<link rel="stylesheet" href="../asset/CSS/bookingstyle.css">

<body>
    <div class="seat-head">
        <h2>Available Seats</h2>
        <h2><?php echo $_SESSION['available_seats']; ?></h2>
    </div>
    <form method="POST">
       
        <div class="seat-container">
            <?php
 
 
            for ($i = 1; $i <= 40; $i++) {
                echo '<button  type="submit" name="select_seat" value="' . $i . '">' . $i . '</button>';

            }
 
            ?>
        </div>
        <div class="seat-head">
        <h1>Seat Booking</h1>
        <p>Booked Seats: <?php echo count($_SESSION['selected_seats']); ?></p>
        
        <p>Selected Seats:
            <?php
            if (empty($_SESSION['selected_seats'])) {
                echo 'None';
            } else {
                foreach ($_SESSION['selected_seats'] as $seat) {
                    echo $seat . ' ';
                }
            }
            ?>
        </p>
        <p>Total Price: <?php echo $_SESSION['total_price']; ?> tk</p>
       
        <button type="submit" name="book_seats" >Booked Seats</button>
        </div>
    </form>
   
    <a href="home.html">back</a>


    
</body>
</html>