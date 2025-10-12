<?php 
    require_once('../model/zihaduldb.php');
    if(isset($_POST['Submit'])){
        $amount= $_POST['amount'];
        $deduct_percentage = 10;
        $refund_amount = $amount - ($amount * ($deduct_percentage / 100));
        $refund_policy = "Refund cannot be accepted before 1 day of bus departure!";
       // echo "Refund Policy: $refund_policy";

        echo json_encode($amount);

        if(ctype_digit( $amount))

        {
            $status = Refunds($refund_policy, $amount, $deduct_percentage,$refund_amount);
        

            if($status){
              //  header('location: ../view/viewAmount.html');
              echo "Successful!\n";

              echo   "Refund Amount is:$refund_amount";
 
            }
             else{
                header('location: ../view/refund_policy.php');
            }

        }
        else
        {
           echo "Enter The Amount in Numeric way";
           header('location: ../view/refund_policy.php');


        }



    }else{
        header('location: ../view/refund_policy.php');
    }

?>

