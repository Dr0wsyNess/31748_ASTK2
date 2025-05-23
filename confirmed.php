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
    // read cars.json file from local disk
    $strJSONContents = file_get_contents("cars.json");
    $strJSONContentsOrder = file_get_contents("orders.json");

    $array = json_decode($strJSONContents, true);
    $orderArray = json_decode($strJSONContentsOrder, true);

    if (isset($_POST['submitForm'])) {
        $reservation = $_SESSION['reservation'];
        $cartArray = implode(',', array_keys($reservation));
        $filtered = array_filter($array['cars'], function ($car) use ($cartArray) {
            return strtolower($car['vin']) === strtolower($cartArray);
        });
        $display = $filtered;
        foreach ($display as $cars) {
            //if the car is unavailable --> display alert
            if (!($cars['available'])) {
                $message = $cars['carType'] . " is not available anymore";
                echo "<script>alert ('$message'); window.location.href='reservation.php';</script>";
                exit();
            } else {
                //if the car is available --> add order to the order.json
                $newOrder = array(
                    "customer" => array(
                        "name" => $_POST['fname'] . " " . $_POST['lname'],
                        "phoneNumber" => $_POST['phone'],
                        "email" => $_POST['email'],
                        "driversLicenseNumber" => $_POST['license']
                    ),
                    "car" => array(
                        "vin" => $cars['vin'],
                    ),
                    "rental" => array(
                        "startDate" => $_POST['startDate'],
                        "rentalPeriod" => $_SESSION['dateRented'],
                        "totalPrice" => $_SESSION['dateRented'] * $cars['pricePerDay'],
                        "orderDate" => date('d-m-Y')
                    )
                );
                $orderArray["orders"][] = $newOrder;
                $newStrPretty = json_encode($orderArray, JSON_PRETTY_PRINT);
                file_put_contents("orders.json", $newStrPretty);

                //set the car to unavailable and write into cars.json
                foreach($array['cars'] as $key => $value){
                    if($value['vin'] == $cars['vin']){
                        $array['cars'][$key]['available'] = false;
                    }
                }
                $newJsonString = json_encode($array, JSON_PRETTY_PRINT);
                file_put_contents('cars.json', $newJsonString);
            }
        }
        //clear session & reset the variables 
        unset($_SESSION['reservation']);
        unset($_SESSION['dateRented']);
        unset($_SESSION['startDate']);
        unset($_SESSION['endDate']);
        $dateRented = 0;
        $startDate = '';
        $endDate = '';
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
    <div class="main" style="text-align: center;">
        <h1>Order Confirmation</h1>
        <p>Thanks <b><?= $_POST['fname'] ?></b> for rending at <b><span class="span">Drowsy Online Car Rental</span></b>. Order Summary has been send to your email, <b><?= $_POST['email'] ?></b></p>
        <br> <br>
        <a href="index.php">
            <button class="checkOut-btn">Return to Home</button>
        </a>
    </div>

</body>

</html>