<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="index" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <title>Online Car Rental System</title>
</head>

<body>
    <?php
    session_start();

    //Add to reservation
    if (isset($_POST['rentThisCar'])) {
        $vin = $_POST['car_vin'];
        //clear the existing reservation array and add new car
        $_SESSION['reservation'] = array();
        $_SESSION['reservation'][$vin]['quantity'] = 1;
        header("Location: reservation.php"); // redirect to reservation page
    }

    ?>
    <div id="top" class="nav">
        <div class="logo">
            <a href="index.php" class=="logo"><img src="./images/logo_mono.png" width="35"></a>
        </div>
        <div class="leftNav">
            <a class="active" href="index.php">Home</a>
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
            <a href="reservation.php">
                <i class="material-icons" style="font-size: 100%;">directions_car</i>
                Car Reservation
            </a>
        </div>
    </div>



    <div class="main">
        <p id="test"></p>
        <?php include('filter.php'); ?>
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
        Website by &copy; 2025 Vanessa Nguyen [SID: 24507129]
        <br><br>Programming on the Internet [31748]
        <br>University of Technology, Sydney
    </p>
</footer>
<script src="index.js"></script>

</html>

<?php

?>