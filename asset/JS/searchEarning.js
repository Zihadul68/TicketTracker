function searchEarnings() {
    let searchValue = document.getElementById("searchBox").value.trim();
    let xhttp = new XMLHttpRequest();

    xhttp.open("POST", "../controller/search_earning.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("search=" + encodeURIComponent(searchValue));

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let tableBody = document.querySelector("table tbody");

            if (!tableBody) {
                console.error("Table body not found!");
                return;
            }

            tableBody.innerHTML = "";
            let response;
            try {
                response = JSON.parse(this.responseText);
            } catch (error) {
                console.error("Invalid JSON response:", this.responseText);
                return;
            }

            if (response.length === 0) {
                let noDataRow = document.createElement("tr");
                let noDataCell = document.createElement("td");
                noDataCell.colSpan = "5";
                noDataCell.style.color = "red";
                noDataCell.style.fontWeight = "bold";
                noDataCell.style.textAlign = "center";
                noDataCell.textContent = "No Earnings Found";

                noDataRow.appendChild(noDataCell);
                tableBody.appendChild(noDataRow);
            } else {response.forEach((earning) => {
                    let row = document.createElement("tr");

                    let dateCell = document.createElement("td");
                    dateCell.textContent = earning.date;
                    row.appendChild(dateCell);

                    let busIdCell = document.createElement("td");
                    busIdCell.textContent = earning.busId;
                    row.appendChild(busIdCell);

                    let ridersCell = document.createElement("td");
                    ridersCell.textContent = earning.riders;
                    row.appendChild(ridersCell);

                    let grossEarningsCell = document.createElement("td");
                    grossEarningsCell.textContent = "$" + earning.grossEarnings;
                    row.appendChild(grossEarningsCell);

                    let commissionCell = document.createElement("td");
                    commissionCell.textContent = "$" + earning.commission;
                    row.appendChild(commissionCell);

                    tableBody.appendChild(row);
                })
            }
        }
    }
}
