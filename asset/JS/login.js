function validateLogin() {
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();

    if (!username || !password) {
        alert("Username and password are required.");
        return false;
    }

    const data = new URLSearchParams();
    data.append('loginData', JSON.stringify({ username, password }));

    const xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/logincheck.php', true);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4) {
            console.log("Response:", this.responseText); 
            if (this.status === 200) {
                try {
                    const response = JSON.parse(this.responseText);

                    alert(response.message);

                    if (response.success) {
                        if (response.usertype === 'admin') {
                            window.location.href = "../view/adminMenu.php";
                        } else if (response.usertype === 'operator') {
                            window.location.href = "../view/Operator_menu.php";
                        } else if (response.usertype === 'traveller') {
                            window.location.href = "../view/Traveller_menu.php";
                        }
                    }
                } catch (err) {
                    alert("Unexpected response: " + this.responseText);
                }
            } else {
                alert("Server error: " + this.status);
            }
        }
    };

    xhttp.send(data.toString());
    return false; 
}

document.getElementById('revealPassword').addEventListener('click', function () {
    const passwordField = document.getElementById('password');
    passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
    this.textContent = passwordField.type === 'password' ? 'Show' : 'Hide';
});
