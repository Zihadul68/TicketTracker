<?php
session_start();
if(!isset($_COOKIE['status'])){
    header('location: ./login.html');  
}
?>
<html>
<head>
    <title>Search Bus</title>
    <link rel="stylesheet" href="../asset/CSS/styleSearchBus.css">
</head>
<body>

<form method="post" action="../controller/searchBusCheck.php" onsubmit="return ValidateSearchRouteJavaScript()">      
    <fieldset>
        <legend>Search Bus</legend> 
        <h4>Select Bus Route</h4>

        <!-- Pickup location -->
        <label for="pickup-location-select">Pickup Location:</label>
        <select id="pickup-location-select" name="Pickup_location" required>
            <option value="" disabled selected>Select Pickup Location</option>
            <option value="dhaka">Dhaka</option>
            <option value="ctg">Chittagong</option>
            <option value="Cox Bazar">Cox’s Bazar</option>
            <option value="mym">Mymensingh</option>
            <option value="Sylhet">Sylhet</option>
        </select>

        <!-- Destination location -->
        <label for="destination-location-select">Destination Location:</label>
        <select id="destination-location-select" name="Destination_location" required>
            <option value="" disabled selected>Select Destination</option>
            <option value="dhaka">dhaka</option>
            <option value="ctg">Ctg</option>
            <option value="Cox Bazar">Cox’s Bazar</option>
            <option value="mym">Mymensingh</option>
            <option value="Sylhet">Sylhet</option>
        </select>

        <!-- Bus class -->
        <label for="bus-class">Bus Class:</label>
        <select id="bus-class" name="selectBusClass" required>
            <option value="Ac_Business">Ac-Business</option>
            <option value="Ac_Sleeper">Ac-Sleeper</option>
            <option value="Ac_Seater">Ac-Seater</option>
            <option value="Non-Ac">Non-Ac</option>
        </select>
        <br><span id="Selection_Error"></span><br>

        <div align="left">
            <input type="submit" name="Submit" value="Proceed">
        </div>
        <div align="right">
            <a href="Traveller_menu.php">Back</a>
        </div>
    </fieldset>
</form>

<script src="../asset/JS/validation.js"></script>

</body>
</html>
