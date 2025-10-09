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

    // function SearchRouteAjax() {

    //    if(! ValidateSearchRouteJavaScript())return;
    //     // Retrieve values from the form
    //     const pickupLocation = document.getElementById("pickup-location-select").value;
    //     const destinationLocation = document.getElementById("destination-location-select").value;
    //     const busClass = document.getElementById("bus-class").value;


    
    //     // Create an XMLHttpRequest object
    //     const xhttp = new XMLHttpRequest();
    //     xhttp.open("POST", "../controller/searchBusCheck.php", true);
    //     xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    //     // Handle server response
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState === 4 && this.status === 200) {
    //             document.getElementById("result").innerText = this.responseText;
    //         }
    //     };
    
    //     // Send data in the format key=value&key=value
    //     xhttp.send("Pickup_location=" + pickupLocation +"&Destination_location=" + destinationLocation +"&selectBusClass=" + busClass +"&Submit=true");
    // }
    
   

// ...........................refund..................


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
 
// ...........................Feedback..................


function ajaxFeedback(){

    let rate = document.getElementById('rates').value;
    let like = document.getElementById('likes').value;
    let suggestion = document.getElementById('suggestion').value;


    
    let xhttp = new XMLHttpRequest();
 
    xhttp.open('POST', '../controller/feedbackCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            
            let rates = JSON.parse(this.responseText);
            let likes = JSON.parse(this.responseText);
            let suggestions = JSON.parse(this.responseText);


            document.getElementById('resultRates').innerText = rates;
            document.getElementById('resultLikes').innerText = likes;
            document.getElementById('resultSuggession').innerText =suggestions;




          
         }
    }
 
    xhttp.send('rate='+rate + "&like="+like + "&suggestion="+suggestion);

}



// ...........................busSearch..................


// function ajaxSearchBus(){


//     let pickup = document.getElementById('pickup-location-select').value;
//     let destination = document.getElementById('destination-location-select').value;
//     let BusClass = document.getElementById('bus-class').value;


    
//     let xhttp = new XMLHttpRequest();
 
//     xhttp.open('POST', '../controller/searchBusCheck.php', true);
//     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhttp.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status == 200){
            
//             let pickups = JSON.parse(this.responseText);
//             let destinations = JSON.parse(this.responseText);
//             let BusClasss = JSON.parse(this.responseText);


//             document.getElementById('resultPicup').innerText = pickups;
//             document.getElementById('resultDestination').innerText = destinations;
//             document.getElementById('resultBusClass').innerText =BusClasss;




          
//          }
//     }
 
//     xhttp.send('Pickup_location='+pickup + "&Destination_location="+destination + "&selectBusClass="+BusClass);




// }




