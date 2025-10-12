function check_password() {
    let passwordField = document.getElementById("password");
    let errorElement = document.getElementById("password_val");
    let password = passwordField.value.trim();

    if (password === "") {
        errorElement.textContent = "Password cannot be null";
        errorElement.style.display = "block";
    } else if (password.length < 8) {
        errorElement.textContent = "Password must be at least 8 characters long";
        errorElement.style.display = "block";
    }else if (!/[a-z]/.test(password)) {
        errorElement.textContent = "Password must contain at least one lowercase letter";
        errorElement.style.display = "block";
    } else if (!/[0-9]/.test(password)) {
        errorElement.textContent = "Password must contain at least one digit";
        errorElement.style.display = "block";
    } else if (!/[A-Z]/.test(password)) {
        errorElement.textContent = "Password must contain at least one uppercase letter";
        errorElement.style.display = "block";
    } else {
        errorElement.style.display = "none";
    }
}
function check_fullname() {
    let fullname = document.getElementById("fullname").value.trim();
    let errorElement = document.getElementById("fullname_val");

    if (fullname === "") {
        errorElement.textContent = "Full Name cannot be empty";
        errorElement.style.display = "block";
    } else if (!/^[A-Za-z\s]+$/.test(fullname)) {
        errorElement.textContent = "Full Name can only contain letters and spaces";
        errorElement.style.display = "block";
    } else {
        errorElement.style.display = "none";
    }
}

function check_email() {
    let email = document.getElementById("email").value.trim();
    let errorElement = document.getElementById("email_val");

    if (email === "") {
        errorElement.textContent = "Email cannot be empty";
        errorElement.style.display = "block";
    } else {
        errorElement.style.display = "none";
    }
}

function check_phone() {
    let phone = document.getElementById("phone").value.trim();
    let errorElement = document.getElementById("phone_val");

    if (phone === "") {
        errorElement.textContent = "Phone Number cannot be empty";
        errorElement.style.display = "block";
    } else if (!/^\d{11}$/.test(phone)) {
        errorElement.textContent = "Phone Number must be exactly 11 digits";
        errorElement.style.display = "block";
    } else {
        errorElement.style.display = "none";
    }
}


function check_dob() {
    let dob = document.getElementById("dob").value.trim();
    let errorElement = document.getElementById("dob_val");

    if (dob === "") {
        errorElement.textContent = "Date of Birth cannot be empty";
        errorElement.style.display = "block";
    } else {
            errorElement.style.display = "none";
    }
}

