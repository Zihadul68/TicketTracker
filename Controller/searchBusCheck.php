<?php 
    require_once('../model/zihaduldb.php');
    if(isset($_POST['Submit'])){
        $Pickup_Location= $_POST['Pickup_location'];
        $Destination_location = $_POST['Destination_location'];
        $Bus_Class = $_POST['selectBusClass'];
         
         
        // echo json_encode($Pickup_Location);
        // echo json_encode($Destination_location);
        // echo json_encode($Bus_Class);

        if( $Pickup_Location==$Destination_location)
        {
            echo "Select Different Location";
        }
        else
        {
            
        $status = SearchBusRoute($Pickup_Location, $Destination_location, $Bus_Class);
        

        if($status){
            header('location: ../view/searchBusList.php');
          //echo "Check in database";
        } else{
            header('location: ../view/searchBus.php');
        }

        }
        


    }else{
        header('location: ../view/searchBus.php');
    }

?>
