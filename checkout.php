<!DOCTYPE html>
<html lang="en">
<?php
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
if (!isset($_SESSION['fname'])) {
    $_SESSION['fname'] = '';
}

// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     echo "invalid email format";
// } else {
//     echo "form submitted";
// }
// if(isset($_POST['submitForm'])){
//     $_SESSION['fname'] = $_POST['fname'];
// }

?>

<div class="container">
    <div class="deliveryDetail">
        <h1 style="text-align: center;">Delivery Details</h1>
        <form method="post" action="confirmed.php" id="checkoutForm">
            <div class="row">
                <div class="rowGroup">
                    <label for="fname" class="formLabel">FIRST NAME <span style="color: red;">*</span></label>
                    <input type="text" id="fname" name="fname" class="formField" value="<?= $_SESSION['fname'] ?>"
                        required>
                </div>
                <div class="rowGroup">
                    <label for="lname" class="formLabel">LAST NAME <span style="color: red;">*</span></label>
                    <input type="text" id="lname" name="lname" class="formField" required>
                </div>
            </div> <br>
            <div class="row">
                <div class="rowGroup" for="phone">
                    <label for="phone" class="formLabel">MOBILE PHONE <span style="color: red;">*</span></label>
                    <input type="tel" id="phone" name="phone" minlength="10" maxlength="10" pattern="[0-9]{10}"
                        class="formField" required>
                </div>
                <div class="rowGroup">
                    <label for="email" class="formLabel">EMAIL ADDRESS <span style="color: red;">*</span></label>
                    <input type="email" id="email" name="email" class="formField" required>
                </div>
            </div> <br>
            <div class="row">
                <div class="rowGroup">
                    <label for="license" class="formLabel">DRIVER'S LICENSE NUMBER <span
                            style="color: red;">*</span></label>
                    <input type="text" id="license" name="license" class="formField" minlength="10" maxlength="10" pattern="^D[0-9]{9}$" required>
                </div>
            </div> <br>
            <div class="row">
                <div class="rowGroup">
                    <label for="sDate" class="formLabel">START DATE <span style="color: red;">*</span></label>
                    <input type="date" name="startDate" id="startDate" value="<?= $_SESSION['startDate'] ?>"
                        min="<?= date('d-m-Y'); ?>" required>
                </div>
                <div class="rowGroup">
                    <label for="eDate" class="formLabel">END DATE <span style="color: red;">*</span></label>
                    <input type="date" name="endDate" id="endDAte" value="<?= $_SESSION['endDate'] ?>"
                        min="<?= $_SESSION['startDate'] ?>">
                </div>
            </div> <br>
            <!-- <div class="row">
                    <div class="rowGroup">
                        <label for="suburb" class="formLabel">CITY/ SUBURB <span style="color: red;">*</span></label>
                        <input type="text" id="suburb" name="suburb" class="formField" required>
                    </div> 
                    <div class="rowGroup">
                        <label for="state" class="formLabel">STATE <span style="color: red;">*</span></label>
                        <select id="state" name="state" class="formField" required>
                            <option value="nsw">NSW</option>
                            <option value="vic">VIC</option>
                            <option value="qld">QLD</option>
                            <option value="wa">WA</option>
                            <option value="sa">SA</option>
                            <option value="tas">TAS</option>
                            <option value="act">ACT</option>
                            <option value="nt">NT</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                </div> <br>
                <div class="row">
                    <div class="rowGroup">
                        <label for="postcode" class="formLabel">POSTCODE <span style="color: red;">*</span></label>
                        <input type="number" id="postcode" name="postcode" min="0200" max="9999" class="formField" required>
                    </div>
                </div> -->
            <div class="row">
                <div class="rowGroup">
                    Rental Days :<?= $dateRented ?></td>
                </div>
                <div class="rowGroup">
                    Total : $<?= $total = $dateRented * $cars['pricePerDay']; ?></td>
                </div>
                <div style="text-align: center;">
                    <br><input type="submit" name="submitForm" class="checkOut-btn" value="Submit">
                </div>
        </form>
        <div id="response"></div>

    </div>
    <p id="test">text</p>
    <script>
        // const dateDifferenceInDays = (dateInitial, dateFinal) =>
        //     (dateFinal - dateInitial) / 86_400_000;
        // const form = document.getElementById("checkoutForm");
        // form.addEventListener("submit", function (event) {
        //     event.preventDefault();
        //     // isValid = false;
        //     // var fname = document.getElementById("fname").value;
        //     // var startDate = document.getElementById("startDate").value;
        //     // var endDate = document.getElementById("endDate").value;
        //     // var email = document.getElementById("email").value;
        //     // document.getElementById("test").innerHTML = startDate;

        //     // if (!fname) {
        //     //     alert("Name field is required.");
        //     //     return false;
        //     // }
        //     // if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        //     //     alert("Invalid email format.");
        //     //     return false;
        //     // }
        //     // const formData = new FormData(form);

        //     // fetch(form.action, {
        //     //     method: 'POST',
        //     //     body: formData
        //     // })
        //     //     .then(response => response.text())
        //     //     .then(data => {
        //     //         document.getElementById('response').innerHTML = data;
        //     //     })
        //     //     .catch(error => {
        //     //         console.error('Error:', error);
        //     //     });
        // });
    </script>

</html>