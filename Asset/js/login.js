document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let username = document.getElementById('username').value.trim();
    let password = document.getElementById('password').value.trim();

    if(username === "" || password === ""){
        alert("Username and password are required.");
        return;
    }

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../controller/logincheck.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if(xhr.status === 200){
            let response = JSON.parse(xhr.responseText);
            alert(response.message);

            if(response.success){
                if(response.usertype === "traveller") window.location.href = "../view/Traveller_menu.php";
                else if(response.usertype === "admin") window.location.href = "../view/adminMenu.php";
                else if(response.usertype === "operator") window.location.href = "../view/Operator_menu.php";
            }
        } else {
            alert("An error occurred. Status: " + xhr.status);
        }
    };
    xhr.send("loginData=" + JSON.stringify({username: username, password: password}));
});
