<?
    session_start();
    if(!isset($_COOKIE['status'])){
      header('location: ./login.html');  
     }
?>

<html>
<head>
    <title>Refund Policy</title>
    <link rel="stylesheet" href="../asset/CSS/refundPolicy.css">

</head>
<body>
<form onsubmit="return false;">
            <fieldset>
             <legend>Refund</legend> 
             <br>
             <!--
             <button onclick="alert('Warning: Refund cannot be accepted before 1 day of bus departure!')">Refund Policy</button><br>
            -->
             <p>Refund Policy:'Warning, Refund cannot be accepted before 1 day of bus departure!'</p>
             <br>
            



                <table border =1>

                    <tr>
                        <td>Amount</td>
                        <td><input type="number" id="amount" name="amount" placeholder="Total Amount" onsubmit="ajaxRefund()" >       <span id="amountError"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>deduct_percentage</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Refund_Amount</td>
                        <td>check below after submitting..</td>
                    </tr>


                    
                    
                </table>
                <br>
                <div align="left">
               
                <button type="button" name="Submit" onclick="validateRefundFormAjax()">Submit</button>

                </div>
                  
                </div>
                <div align="right">
                    <a href="Traveller_menu.php">Back</a>
                </div>


            </fieldset>

        </form>

        <script src="../asset/JS/validation.js"></script>
        <div id="result"></div><br>
        <table id="resultA"></table>
       



</body>


</html>