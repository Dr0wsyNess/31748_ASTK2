<?php
    // read cars.json file from local disk
    $strJSONContents = file_get_contents("cars.json");

    // Decode it:
    // When the second argument is true, JSON objects will be returned as associative arrays; 
    // when the second argument is false, JSON objects will be returned as objects.
    $array = json_decode($strJSONContents, true);

    
?>

<div class="grid">
        <?php
        //Traverse the cars collection and print out each car
        foreach($array["cars"] as &$cars){
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
                        <!-- <input type="hidden" name="product_id" value="?= $product['product_id'] ?>"> -->
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