function searchBus() {
    let searchQuery = document.getElementById("searchBox").value.trim();
    let xhttp = new XMLHttpRequest();

    xhttp.open("POST", "../controller/search_bus.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("search=" + encodeURIComponent(searchQuery));

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let tableBody = document.querySelector("table tbody");

            

            if (this.responseText.trim() === "No Bus Found") {
                tableBody.innerHTML = "";
                let noBusRow = document.createElement("tr");
                let noBusCell = document.createElement("td");
                noBusCell.colSpan = "9"; 
                noBusCell.style.color = "red";
                noBusCell.style.fontWeight = "bold";
                noBusCell.style.textAlign = "center";
                noBusCell.textContent = "No Bus Found";
                noBusRow.appendChild(noBusCell);
                tableBody.appendChild(noBusRow);
            }
             else {
                tableBody.innerHTML = this.responseText;
            }
        }
    }
}
