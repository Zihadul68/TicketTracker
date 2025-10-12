function validateFeedbackFormJavaScript() {
    let isValid = true;

     
    document.getElementById("suggestionError").innerText ="";

    const rate_service = document.getElementById("rates").value; 
    const like_service = document.getElementById("likes").value; 
    const suggestion = document.getElementById("suggestion").value; 


    if (rate_service==like_service)
        {
        document.getElementById("suggestionError").innerText = " Suggestion  is required.";
        document.getElementById("suggestionError").style.color = " red";
        isValid = false;
        }





    if (suggestion==="")
    {
    document.getElementById("suggestionError").innerText = " Suggestion  is required.";
    document.getElementById("suggestionError").style.color = " red";
    isValid = false;
    }

     
    return isValid;


    }


    //.................................................


    function validateFeedbackFormAjax() {
         if (!validateFeedbackFormJavaScript() ) return;
 

        const suggestion = document.getElementById("suggestion").value; 
        const rate_service = document.getElementById("rates").value; 
        const like_service = document.getElementById("likes").value; 






 
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../controller/feedbackCheck.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("result").innerText = this.responseText;
            }
        };
        
        xhttp.send("suggestion=" + suggestion + "&rate="+rate_service + "&like="+like_service +"&Submit=true");
    }








//......................................................................


    function validateRefundFormJavaScript() 
    {
        let isValid2 = true;


        document.getElementById("amountError").innerText = "";

        const amount = document.getElementById("amount").value;
        if(amount=== "")
        {

            document.getElementById("amountError").innerText = "amount is required.";
            document.getElementById("amountError").style.color = "red";
            isValid2 = false;
        }



     
             
      return isValid2;


    }

    function validateRefundFormAjax() {
        if (! validateRefundFormJavaScript()) return;
 
  
        const amount = document.getElementById("amount").value;

 
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../controller/refundPolicyCheck.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("result").innerText = this.responseText;
            }
        };
        
        xhttp.send("amount=" + amount +  "&Submit=true");
    }


  
   


    function ValidateSearchRouteJavaScript() {
        let isValid = true;
    
         
        document.getElementById("Selection_Error").innerText ="";
    
        const pickupLocation = document.getElementById("pickup-location-select").value;
        const destinationLocation = document.getElementById("destination-location-select").value;
    
        if (pickupLocation==destinationLocation)
            {
            document.getElementById("Selection_Error").innerText = " Search Different Location";
            document.getElementById("Selection_Error").style.color = " red";
            isValid = false;
            }
    

    

    
         
        return isValid;
         
    
        }




function ajaxRefund(){
 
    let amount = document.getElementById('amount').value;
    
    let xhttp = new XMLHttpRequest();
 
    xhttp.open('POST', '../controller/refundPolicyCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            
            let amounts = JSON.parse(this.responseText);
            document.getElementById('resultA').innerText = amounts;


          
         }
    }
 
    xhttp.send('amount='+amount);
}






