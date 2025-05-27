<?php
// read cars.json file from local disk
$strJSONContents = file_get_contents("cars.json");

// Decode it:
// When the second argument is true, JSON objects will be returned as associative arrays; 
// when the second argument is false, JSON objects will be returned as objects.
$array = json_decode($strJSONContents, true);

$uniqueType = [];
$uniqueBrand = [];

foreach ($array["cars"] as &$cars) {
    if (!in_array($cars["carType"], $uniqueType)) {
        $uniqueType[] = $cars["carType"];
    }
    if (!in_array($cars["brand"], $uniqueBrand)) {
        $uniqueBrand[] = $cars["brand"];
    }
}
?>

<div class="filterNav" id="myCatNav">
    <div class="dropdown">
        <div>
            <a>Car Type</a>
            <button class="dropdown-btn">
                <!--down arrow icon-->
                <i class="material-icons">arrow_drop_down</i>
            </button>
        </div>
        <div class="dropdown-content">
            <?php
            for ($i = 0; $i < count($uniqueType); $i++) {
            ?>
                <!-- url will display carType= with the current carType -->
                <a href="?car_type=<?= $uniqueType[$i] ?>">
                    <?= $uniqueType[$i] ?>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="dropdown">
        <div>
            <a>Car Brand</a>

            <button class="dropdown-btn">
                <!--down arrow icon-->
                <i class="material-icons">arrow_drop_down</i>
            </button>
        </div>
        <div class="dropdown-content">
        <?php
            for ($i = 0; $i < count($uniqueBrand); $i++) {
            ?>
                <!-- url will display uniqueBrand= with the current uniqueBrand -->
                <a href="?car_brand=<?= $uniqueBrand[$i] ?>">
                    <?= $uniqueBrand[$i] ?>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>