<?php
    // read cars.json file from local disk
    $strJSONContents = file_get_contents("cars.json");

    // Decode it:
    // When the second argument is true, JSON objects will be returned as associative arrays; 
    // when the second argument is false, JSON objects will be returned as objects.
    $array = json_decode($strJSONContents, true);

    
    $display = [];

    //filter display via users input in searchbar
    if(isset($_REQUEST['searchedCar'])){
        $keyword = $_REQUEST['searchedCar'];
        $filtered = array_filter($array['cars'], function($car) use ($keyword){
            //https://www.php.net/manual/en/function.str-contains.php
            //http://stackoverflow.com/questions/53571988/how-to-filter-json-in-php
                return str_contains(strtolower($car['carType']), strtolower(strtolower($keyword))) ||
                str_contains(strtolower($car['brand']), strtolower(strtolower($keyword))) ||
                str_contains(strtolower($car['carModel']), strtolower(strtolower($keyword))) ||
                str_contains(strtolower($car['description']), strtolower(strtolower($keyword)));
        });
        $display['cars'] = $filtered;
    }
    else if(isset($_REQUEST['car_type'])){
        $type = $_REQUEST['car_type'];
        //filter through the json array using the request: TYPE
        $filtered = array_filter($array['cars'], function($car) use ($type){
            return strtolower($car['carType']) === strtolower($type);
        });
        //populate the array with the filtered data
        $display['cars'] = $filtered;
    }
    else if(isset($_REQUEST['car_brand'])){
        $brand = $_REQUEST['car_brand'];
        //filter through the json array using the request: TYPE
        $filtered = array_filter($array['cars'], function($car) use ($brand){
            return strtolower($car['brand']) === strtolower($brand);
        });
        //populate the array with the filtered data
        $display['cars'] = $filtered;
    }
    else{
        //display all cars
        $display = $array;
    }
?>



<div class="grid">
        <?php
        //Traverse the cars collection and print out each car
        foreach($display["cars"] as &$cars){
            ?>
            <div class="item">
                <img src="<?= $cars['image'] ?>" height="100px">
                <hr>
                <h3><?= $cars['carType'] ?></h3>
                <h4><?= $cars['brand'] ?></h4>
                <p><?= $cars['mileage'] ?></p>
                <p><?= $cars['fuelType'] ?></p>
                <p class="price" style="font-weight: bold">$<?= $cars['pricePerDay'] ?></p>
                <p style="font-size: 75%; color: grey"><?= $cars['description'] ?></p>
                <?php
                //toggle addCart button which is dependent on the stock quantity
                if ($cars['available']) {
                ?>
                    <!-- <label style="font-size: 80%">in stock</label><br><br> -->
                    <form method="post" action="index.php">
                        <input type="hidden" name="car_vin" value="<?= $cars['vin'] ?>">
                        <input type="submit" name="rentThisCar" class="default-btn" value="Rent this car">
                    </form>
                <?php
                } else {
                ?>
                    <!-- <label style="font-size: 80%">not in stock</label><br><br> -->
                    <form>
                        <input type="submit" class="default-btn" value="Rent this car" disabled>
                    </form>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
</div>