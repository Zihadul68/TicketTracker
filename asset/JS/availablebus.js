function ajax(){
 
    let term = document.getElementById('term').value;
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../controller/availablebuscheek.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('term='+term);
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            
            let users = JSON.parse(this.responseText);
            let search = `<tr>
                                    
                                    <td>Time</td>
                                    <td>Bustype</td>
                                    <td>price</td>
                                </tr>`;

            for (let i=0;i<users.length;i++)
                
                
                {
               search += `<tr>
                                    
                                     <td>${users[i].time}</td>
                                     <td>${users[i].bustype}</td>
                                     <td>${users[i].price}</td>
                                 </tr>`;
            }

            document.getElementById('result').innerHTML = search;
        }
        if(term === "")
            
            {
            document.getElementById('result').innerHTML = ""; 
          
        }
    }

    
}
