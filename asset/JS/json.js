

// // ...........................refund..................


// function ajaxRefund(){
 
//     let amount = document.getElementById('amount').value;
    
//     let xhttp = new XMLHttpRequest();
 
//     xhttp.open('POST', '../controller/refundPolicyCheck.php', true);
//     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhttp.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status == 200){
            
//             let amounts = JSON.parse(this.responseText);
//             document.getElementById('resultA').innerText = amounts;


          
//          }
//     }
 
//     xhttp.send('amount='+amount);
// }
 
// // ...........................Feedback..................


// function ajaxFeedback(){

//     let rate = document.getElementById('rates').value;
//     let like = document.getElementById('likes').value;
//     let suggestion = document.getElementById('suggestion').value;


    
//     let xhttp = new XMLHttpRequest();
 
//     xhttp.open('POST', '../controller/feedbackCheck.php', true);
//     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhttp.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status == 200){
            
//             let rates = JSON.parse(this.responseText);
//             let likes = JSON.parse(this.responseText);
//             let suggestions = JSON.parse(this.responseText);


//             document.getElementById('resultRates').innerText = rates;
//             document.getElementById('resultLikes').innerText = likes;
//             document.getElementById('resultSuggession').innerText =suggestions;




          
//          }
//     }
 
//     xhttp.send('rate='+rate + "&like="+like + "&suggestion="+suggestion);

// }



// // ...........................busSearch..................


// // function ajaxSearchBus(){


// //     let pickup = document.getElementById('pickup-location-select').value;
// //     let destination = document.getElementById('destination-location-select').value;
// //     let BusClass = document.getElementById('bus-class').value;


    
// //     let xhttp = new XMLHttpRequest();
 
// //     xhttp.open('POST', '../controller/searchBusCheck.php', true);
// //     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// //     xhttp.onreadystatechange = function(){
// //         if(this.readyState == 4 && this.status == 200){
            
// //             let pickups = JSON.parse(this.responseText);
// //             let destinations = JSON.parse(this.responseText);
// //             let BusClasss = JSON.parse(this.responseText);


// //             document.getElementById('resultPicup').innerText = pickups;
// //             document.getElementById('resultDestination').innerText = destinations;
// //             document.getElementById('resultBusClass').innerText =BusClasss;




          
// //          }
// //     }
 
// //     xhttp.send('Pickup_location='+pickup + "&Destination_location="+destination + "&selectBusClass="+BusClass);




// // }




