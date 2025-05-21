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
    // read cars.json file from local disk
    $strJSONContents = file_get_contents("cars.json");

    // Decode it:
    // When the second argument is true, JSON objects will be returned as associative arrays; 
    // when the second argument is false, JSON objects will be returned as objects.
    $array = json_decode($strJSONContents, true);
    $dateRented = $_SESSION['dateRented'] ?? 0;

if (!isset($_SESSION['startDate'])) {
    $_SESSION['startDate'] = '';
}
if (!isset($_SESSION['endDate'])) {
    $_SESSION['endDate'] = '';
}

    //clear Cart
    if (isset($_POST['clearReservation'])) {
        unset($_SESSION['reservation']);
        unset($_SESSION['dateRented']);
        unset($_SESSION['startDate']);
        unset($_SESSION['endDate']);
        // Reset the variables too
        $dateRented = 0;
        $startDate = '';
        $endDate = '';
    }

    if (isset($_POST['dateSubmit'])) {
        $startDate = new DateTime($_POST['startDate']);
        $endDate = new DateTime($_POST['endDate']);
        $dateRented = ($startDate->diff($endDate))->days;
        // echo $dateRented;

        $_SESSION['startDate'] = $_POST['startDate'];
        $_SESSION['endDate'] = $_POST['endDate'];
        $_SESSION['dateRented'] = $dateRented;
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
    } else {
        $reservation = $_SESSION['reservation'];
        // print_r($reservation);
        $cartArray = implode(',', array_keys($reservation));
        // echo $cartArray;
        $filtered = array_filter($array['cars'], function ($car) use ($cartArray) {
            return strtolower($car['vin']) === strtolower($cartArray);
        });
        $display = $filtered;
        // var_dump($display);

        $total = 0;
        ?>
            <div class="main">
                <h1>Cart</h1>
                <table>
                    <tr>
                        <th class="row-titles">Image</th>
                        <th class="row-titles">Selected Car Type</th>
                        <th class="row-titles">Brand</th>
                        <th class="row-titles">Model</th>
                        <th class="row-titles">Mileage</th>
                        <th class="row-titles">Fuel Type</th>
                        <th class="row-titles">Price Per Day</th>
                    </tr>
                    <?php
                    foreach ($display as $cars) {
                    ?>
                        <tr>
                            <td style="text-align: center;"><img src="./images/<?= $cars['image'] ?>" height="100px"></td>
                            <td><?= $cars['carType'] ?></td>
                            <td><?= $cars['brand'] ?></td>
                            <td><?= $cars['carModel'] ?></td>
                            <td><?= $cars['mileage'] ?></td>
                            <td><?= $cars['fuelType'] ?></td>
                            <td><?= $cars['pricePerDay'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tfoot>
                        <tr>
                            <form method="post" action="">
                                <!-- <input type="hidden" value="?= $display['vin'] ?>" name="updateQuantityID"> -->
                                <td colspan="3" class="subtotal" style="text-align: right; font-weight: bold;">
                                    <label for="sDate" class="formLabel">START DATE <span style="color: red;">*</span></label>
                                    <input type="date" name="startDate" value="<?= $_SESSION['startDate'] ?>" min="<?= date('d/m/Y'); ?>" >
                                </td>
                                <td colspan="3" class="subtotal" style="text-align: right; font-weight: bold;">
                                    <label for="eDate" class="formLabel">END DATE <span style="color: red;">*</span></label>
                                    <input type="date" name="endDate" value="<?= $_SESSION['endDate'] ?>" min="<?= $_SESSION['startDate'] ?>">
                                </td>
                                <input type="submit" name="dateSubmit" hidden>
                            </form>
                            <td colspan="1" class="subtotal" style="text-align: right; font-weight: bold;">Rental Days :
                                <?= $dateRented ?></td>
                        </tr>

                        <tr>
                            <td colspan="8" class="subtotal" style="text-align: right; font-weight: bold;">Total :
                                $<?= $total = $dateRented * $cars['pricePerDay']; ?></td>
                        </tr>
                    </tfoot>
                </table> <br>
                <div class="cart-btns">
                    <form method="post" action="reservation.php">
                        <input type="submit" value="Clear All" name="clearReservation" class="clearAllCart-btn">
                    </form>
                    <a href="delivery.php"><button class="checkOut-btn" type="button">Place an Order</button> </a>
                </div>
            </div>
        <?php
    }
        ?>
        </div>
</body>