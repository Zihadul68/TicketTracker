function validate() {
    let isValid = true;
    document.getElementById("emailmsg").innerText = "";
    document.getElementById("commentmsg").innerText = "";

    const email = document.getElementById("email-text").value;
    const comment = document.getElementById("comment-text").value;

    if (email === "") {
        document.getElementById("emailmsg").innerText = "Email is required.";
        document.getElementById('emailmsg').style.color = 'red';
        isValid = false;
    }
     else
      {
        let atCount = 0, dotCount = 0;
        let atPosition = -1, dotPosition = -1;

        for (let i = 0; i < email.length; i++) {
            const char = email[i];

            if (char === '@') 
            {
                atCount++;
                atPosition = i;
            } else if (char === '.') 
            {
                dotCount++;
                dotPosition = i;
            }

            if (atCount > 1 ||
                (dotCount > 0 && dotPosition <= atPosition + 1) ||
                (i === 0 && char === '@') ||
                (i === email.length - 1 && (char === '@' || char === '.'))) {
                isValid = false;
            }
        }

        if (!isValid || atCount !== 1 || dotCount === 0 || dotPosition <= atPosition) 
        {
            document.getElementById("emailmsg").innerText = "Invalid email format.";
            document.getElementById('emailmsg').style.color = 'red';
            isValid = false;
        }
    }

    if (comment === "") {
        document.getElementById("commentmsg").innerText = "Comment is required.";
        document.getElementById('commentmsg').style.color = 'red';
        isValid = false;
    }

    return isValid;
}

function submitForm() {
    if (!validate()) return;

    const email = document.getElementById("email-text").value;
    const comment = document.getElementById("comment-text").value;

    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controller/contractcheek.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("email=" + email + "&comment=" + comment + "&submit=true");

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("result").innerText = this.responseText;
        }
    };
    
    

}





function ajaxcontract()
{
   
 
    const email = document.getElementById("email-text").value;
    const comment=document.getElementById("comment-text").value;
   
    let xhttp = new XMLHttpRequest();
 
    xhttp.open('POST', '../controller/contractcheek.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email=" + email + "&comment=" + comment + "&submit=true");
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
           
            
           let email = JSON.parse(this.responseText);
           let comment = JSON.parse(this.responseText);

 
 
            
            document.getElementById("json-email").innerText = email;
            document.getElementById("json-comment").innerText =comment;
 
}
}
}
