function markAsRead(notificationId) {
    let json = { id: notificationId };
    let data = JSON.stringify(json);  

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controller/notificationMarkAsRead.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    

    xhttp.send("id=" + data);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let response = JSON.parse(this.responseText);
            alert(response.message);

            if (response.success) {

                location.reload(); 
            }

        }
    };
}


function viewAllNotifications() {
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../controller/getAllNotifications.php', true);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhttp.send(); 

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4) {
            if (this.status === 200) {
                let response = JSON.parse(this.responseText);

                if (response.success) {
                    displayAllNotifications(response.notifications);
                } else {
                    alert(response.message || 'Failed to fetch notifications');
                }
            } else {
                alert('An error occurred while fetching notifications.');
            }
        }
    };

}

function displayAllNotifications(notifications) {
    let tableBody = document.getElementById('notification_table_body');

    tableBody.innerHTML = ''; 

    if (notifications.length === 0) {
        tableBody.innerHTML = `<tr><td colspan="5">No notifications found</td></tr>`; 
        return;
    }

    notifications.forEach(notification => {
        let row = document.createElement('tr');
        row.innerHTML = `
            <td>${notification.id}</td>
            <td>${notification.message}</td>
            <td>${notification.type}</td>
            <td>${notification.status}</td>
            <td>${notification.time}</td>
            <td>
                <button onclick="deleteNotification(${notification.id})">Delete</button>
            </td>
        `;
        tableBody.appendChild(row);
    });
   
        let filterRow = document.createElement('tr');
        filterRow.innerHTML = `
            <td colspan="6" align="center">
                <button onclick="viewUnreadNotifications()">See Unread Notifications</button>
            </td>
        `;
    tableBody.appendChild(filterRow);
}

function viewUnreadNotifications() {
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../controller/getUnreadNotification.php', true);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhttp.send(); 

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4) {
            if (this.status === 200) {
                let response = JSON.parse(this.responseText);

                if (response.success) {
                    displayUnreadNotifications(response.notifications);
                } else {
                    alert(response.message || 'Failed to fetch notifications');
                }
            } else {
                alert('An error occurred while fetching notifications.');
            }
        }
    };

}

function displayUnreadNotifications(notifications) {
    let tableBody = document.getElementById('notification_table_body');

    tableBody.innerHTML = ''; 

    if (notifications.length === 0) {
        tableBody.innerHTML = `<tr><td colspan="5">No notifications found</td></tr>`; 
        return;
    }

    notifications.forEach(notification => {
        let row = document.createElement('tr');
        row.innerHTML = `
            <td>${notification.id}</td>
            <td>${notification.message}</td>
            <td>${notification.type}</td>
            <td>${notification.status}</td>
            <td>${notification.time}</td>
            <td>
                <button onclick="markAsRead(${notification.id})">Mark As Read</button>
            </td>
        `;
        tableBody.appendChild(row);
    });
   
        let filterRow = document.createElement('tr');
        filterRow.innerHTML = `
            <td colspan="6" align="center">
                <button onclick="viewAllNotifications()">See All Notifications</button>
            </td>
        `;
    tableBody.appendChild(filterRow);
}


function deleteNotification(notificationId) {
    if (!confirm("Are you sure you want to delete this notification?")) return;

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controller/deleteNotifications.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("id=" + notificationId);

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

