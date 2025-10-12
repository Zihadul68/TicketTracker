function approveUser(username) {
    if (!confirm('Are you sure you want to Approve this user?')) return;

    let json = { username: username };
    let data = JSON.stringify(json);

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/approve.php', true);
    xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    xhttp.send('approvedata=' + data);

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let response = JSON.parse(this.responseText);

            if (response.success) {

                location.reload(); 
            }
        }
    };
}


function rejectUser(username) {
    if (!confirm('Are you sure you want to Reject this user?')) return;

    let json = { username: username };
    let data = JSON.stringify(json);

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/delete.php', true);
    xhttp.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    xhttp.send('deletedata=' + data);

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let response = JSON.parse(this.responseText);
            alert(response.message);

            if (response.success) {
               
                location.reload(); 
            }
        }        
    };
}

function searchByType() {
    let userType = document.getElementById('user_type').value; 

    let json = { user_type: userType };
    let data = JSON.stringify(json);

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/approve.php', true); 
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send('filterData=' + data);

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            
            document.getElementById('user_table_body').innerHTML = this.responseText;
        }
    };
}