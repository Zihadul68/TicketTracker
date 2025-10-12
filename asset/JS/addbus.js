function check_busId() {
    let busId = document.getElementById("busId").value.trim();
    let errorElement = document.getElementById("bus_val");
    if (busId === "") {
        errorElement.textContent = "Bus ID cannot be null";
        errorElement.style.display = "block";
    } else if (busId.length !== 3) {
        errors.push("Bus ID must have exactly 3 digits.");
       
    }else if(!isNumeric) {
        errors.push("Bus ID must be a numeric value.");
    }else {
        errorElement.style.display = "none";
    }
}

function check_busType() {
    let busType = document.getElementById("busType").value;
    let errorElement = document.getElementById("busType_val");
    if (busType === "") {
        errorElement.textContent = "Bus Type cannot be null";
        errorElement.style.display = "block";
    } else {
        errorElement.style.display = "none";
    }
}

function check_startLocation() {
    let startLocation = document.getElementById("startLocation").value.trim();
    let errorElement = document.getElementById("startLocation_val");
    if (startLocation === "") {
        errorElement.textContent = "Start Location cannot be null";
        errorElement.style.display = "block";
    } else {
        errorElement.style.display = "none";
    }
}


function check_endLocation() {
    let endLocation = document.getElementById("endLocation").value.trim();
    let errorElement = document.getElementById("endLocation_val");
    if (endLocation === "") {
        errorElement.textContent = "End Location cannot be null";
        errorElement.style.display = "block";
    } else {
        errorElement.style.display = "none";
    }
}


function check_totalSeats() {
    let totalSeats = document.getElementById("totalSeats").value.trim();
    let errorElement = document.getElementById("totalSeats_val");
    if (totalSeats === "") {
        errorElement.textContent = "Total Seats cannot be null";
        errorElement.style.display = "block";
    } else {
        errorElement.style.display = "none";
    }
}

function check_startTime() {
    let startTime = document.getElementById("startTime").value.trim();
    let errorElement = document.getElementById("startTime_val");
    if (startTime === "") {
        errorElement.textContent = "Start Time cannot be null";
        errorElement.style.display = "block";
    } else {
        errorElement.style.display = "none";
    }
}

function check_endTime() {
    let endTime = document.getElementById("endTime").value.trim();
    let errorElement = document.getElementById("endTime_val");
    if (endTime === "") {
        errorElement.textContent = "End Time cannot be null";
        errorElement.style.display = "block";
    } else {
        errorElement.style.display = "none";
    }
}

function check_pricePerSeat(){
    let pricePerSeat = document.getElementById("pricePerSeat").value;
    if(pricePerSeat.trim() == ""){
        document.getElementById("pricePerSeat_val").style="display:block; color:red"
    }
    else{
        document.getElementById("pricePerSeat_val").style="display:none"
    }
}
