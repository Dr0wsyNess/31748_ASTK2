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
    <?php
    session_start();

    //clear Cart
    if (isset($_POST['clearReservation'])) {
        unset($_SESSION['reservation']);
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
            <!-- <form class="searchbar">
                <input type="text" id="searchBar" placeholder="Search..." name="searchedCar">
                <button type="submit" value="retrieveData"><i class="material-icons">search</i></button>
            </form> -->
        </div>
        <div class="rightNav">
            <a href="reservation.php">
                <i class="material-icons" style="font-size: 100%;">directions_car</i>
                Car Reservation
            </a>
        </div>
    </div>



    <?php
    if (empty($_SESSION['reservation'])) {
    ?>
        <div class="main">
            <h1>Cart</h1>
            <div class="main" style="text-align: center;">
                <h3>Your Reservation is empty</h3>
                <p>No car is currently in reversed.</p>
                <a href="index.php">
                    <button class="checkOut-btn">Return to Home</button>
                </a> <br> <br>
                <a href="delivery.php"><button class="checkOut-btn" type="button" disabled>Check Out</button> </a>
            </div>
    <?php
    }
    else{
        $reservation = $_SESSION['reservation'];
        ?>
        
    
    <?php
    }
    ?>
        </div>
</body>