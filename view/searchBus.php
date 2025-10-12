<?php
     session_start();
    if(!isset($_COOKIE['status'])){
      header('location: ./login.php');  
     }
?>
<html>
<head>
    <title>search bus</title>
    <link rel="stylesheet"   href="../asset/CSS/styleSearchBus1.css">

</head>
<body>
<form  onsubmit="return false;">
      
            <fieldset>
             <legend>Search Bus</legend> 
             <p ><b><h4>Select Bus Route</h4></b></p>

     <!-- Pickup location -->
<input type="text" value="Enter Pickup location" placeholder="">
<select id="pickup-location-select" onsubmit="ajaxSearchBus()">
    <option value="Dhaka">Dhaka</option>
    <option value="Chittagong">Chittagong</option>
    <option value="Coxbazar">Coxbazar</option>
    <option value="Sylhet">Sylhet</option>
    <option value="Rangamati">Rangamati</option>
</select>

<!-- Destination location -->
<input type="text" value="Enter Destination location" placeholder="Enter Destination location">
<select id="destination-location-select" onsubmit="ajaxSearchBus()">
    <option value="Dhaka">Dhaka</option>
    <option value="Chittagong">Chittagong</option>
    <option value="Coxbazar">Coxbazar</option>
    <option value="Sylhet">Sylhet</option>
    <option value="Rangamati">Rangamati</option>
</select>

<!-- Bus class -->
<select id="bus-class" onsubmit="ajaxSearchBus()">
    <option value="Ac_Business">Ac-Business</option>
    <option value="Ac_Sleeper">Ac-Sleeper</option>
    <option value="Ac_Seater">Ac-Seater</option>
    <option value="Non-Ac">Non-Ac</option>
</select><br>
<span id="Selection_Error"></span>

                <br>
                <div align="left">
                <!-- <input type="submit" name="Submit" value="Proceed"> -->
                <button type="button" name="Submit" onclick="SearchRouteAjax()">Proceed</button>

                </div>


            </fieldset>
        </form>
         <!-- Ajax requested result -->
        <div id="result"></div>
        <script src="../asset/jJS/validation.js"></script>

        <!-- jason  requsted result table -->
        <table id="resultPicup"></table>
        <table id="resultDestination"></table>
        <table id="resultBusClass"></table>

        
</body>
</html>