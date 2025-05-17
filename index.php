<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="index" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Online Car Rental System</title>
</head>

<body>
    <div id="top" class="nav">
        <div class="logo">
            <a href="index.html" class= ="logo"><img src="./images/logo_mono.png" width="35"></a>
        </div>
        <div class="leftNav">
            <a class="active" href="index.html">Home</a>
            <a href="about.html">About</a>
        </div>
        <!-- Searchbar -->
        <div class="midNav">
            <form class="searchbar">
                <input type="text" id="searchBar" placeholder="Search..." name="searchedCar">
                <button type="submit" value="retrieveData"><i class="material-icons">search</i></button>
            </form>
        </div>
        <div class="rightNav">
            <a href="reservation.html">
                <i class="material-icons" style="font-size: 100%;">directions_car</i>
                Car Reservation
            </a>
        </div>
    </div>

    <div class="main">
        <?php include('car_display.php'); ?>
    </div>

    <!--Car Reservation Float button-->
    <div>
        <a href="reservation.html">
            <button class="reservation-btn">
                <i class="material-icons">directions_car</i>
            </button>
        </a>
    </div>

</body>

<footer>
    <p>
        Website by &copy; 2023 Vanessa Nguyen [SID: 24507129]
        <br><br>Programming on the Internet [31748]
        <br>University of Technology, Sydney
    </p>
</footer>
<script src="index.js"></script>
</html>

<?php

?>