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
                    <input type="text" id="license" name="license" class="formField" minlength="10" maxlength="10"
                        pattern="^D[0-9]{9}$" required>
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
                    <input type="date" name="endDate" id="endDate" value="<?= $_SESSION['endDate'] ?>"
                        min="<?= $_SESSION['startDate'] ?>">
                </div>
            </div> <br>
            <div class="row">
                <div class="rowGroup">
                    <p id="rentalDays"></p>
                    HTML Rental Days :
                    <?php
                    if ($dateRented !== null) {
                        ?>
                        <p><?php echo $dateRented; ?> </p>
                        <?php
                    }
                    ?>
                    <!-- Rental Days :<= $dateRented ?></td> -->
                </div>
                <div class="rowGroup">
                    <p id="total"></p>
                    Total : $<?= $total = $dateRented * $cars['pricePerDay']; ?></td>
                </div>
                <div style="text-align: center;">
                    <br><input type="submit" name="submitForm" class="checkOut-btn" value="Submit">
                </div>
        </form>
        <div id="response"></div>
    </div>  
    <script>
        document.getElementById('checkoutForm').addEventListener('change', function (e) {
            const startDate = new Date(document.getElementById("startDate").value);
            const endDate = new Date(document.getElementById("endDate").value);
            const pricePerDay = "<?php echo $cars['pricePerDay']; ?>"; 
            if (startDate && endDate && startDate <= endDate) {
                const diffTime = Math.abs(endDate - startDate);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                document.getElementById('rentalDays').textContent = `Preview: ${diffDays} day difference`;
                const total = diffDays * pricePerDay;
                document.getElementById('total').textContent = `Total: $ ${total}`;
                

            }
            else {
                document.getElementById('rentalDays').textContent = ' ';
            }
        });
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