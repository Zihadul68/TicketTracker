function validForm(){
    let username = document.getElementById('username').value.trim();
    let fullname = document.getElementById('fullname').value.trim();
    let phone = document.getElementById('phone').value.trim();
    let dob = document.getElementById('dob').value;

    let currentDate = new Date();
    let birthDate = new Date(dob);
    let age = currentDate.getFullYear() - birthDate.getFullYear();
    let monthDifference = currentDate.getMonth() - birthDate.getMonth();
    if (monthDifference < 0 || (monthDifference === 0 && currentDate.getDate() < birthDate.getDate())) {
        age--;
    }


    let errors = [];





    if (username === "") {
        errors.push("Username cannot be empty.");
    } else if (username.length < 2) {
        errors.push("Username must be at least 2 characters long.");
    } else {
        let firstChar = username.charAt(0);
        if (!(firstChar >= 'a' && firstChar <= 'z' || firstChar >= 'A' && firstChar <= 'Z')) {
            errors.push("The first character of the username must be a letter.");
        }

        for (let i = 0; i < username.length; i++) {
            let char = username.charAt(i);
            if (!(char >= 'a' && char <= 'z' || char >= 'A' && char <= 'Z')) {
                errors.push("Username can only contain letters.");
                break;
            }
        }
    }






    if (fullname === "") {
        errors.push("Fullname cannot be empty.");
    } else if (fullname.length < 3 || fullname.length > 100) {
        errors.push("Full name must be between 3 and 100 characters long.");
    }






   

    if (phone === "") {
        errors.push("Phone number cannot be empty.");
    } else if (phone.length !== 11) {
        errors.push("Phone number must be exactly 11 digits long.");
    } else {
        let validPrefixes = ['013', '014', '015', '016', '017', '018', '019'];
        let prefix = phone.substring(0, 3);
        if (!validPrefixes.includes(prefix)) {
            errors.push("Phone number must start with a valid Bangladeshi prefix.");
        }
    }






    if (dob === "") {
        errors.push("Date of birth cannot be empty.");
    } else if (age < 13) {
        errors.push("You must be at least 13 years old to register.");
    }





    if (errors.length > 0) {
        displayErrors(errors);
        return false;
    }

    let xhttp = new XMLHttpRequest();
    
    let jsonData = {
        username: username,
        fullname: fullname,
        phone: phone,
        dob: dob
    };


    let data= JSON.stringify(jsonData);
    xhttp.open('POST', '../controller/updateCheck.php', true);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send('Data='+ data);

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4) {
            let response = JSON.parse(this.responseText);
            if (this.status === 200 && response.success) {
                alert(' User successfully Updated!');
                window.location.href = '../view/userlist.php';
            } else {
                alert(response.message);
            }
        }
    };

    return false;
}


function displayErrors(errors) {
    let errorMessages = errors.join("\n"); 
    alert(errorMessages); 
}

