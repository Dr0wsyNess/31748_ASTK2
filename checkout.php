<!DOCTYPE html>
<html lang="en">
<?php
?>

<div class="container">
    <div class="checkoutDetail">
        <h1 style="text-align: center;">Checkout Form</h1>
        <form method="post" action="confirmed.php" id="checkoutForm">
            <div class="row">
                <div class="rowGroup">
                    <label for="fname" class="formLabel">FIRST NAME <span style="color: red;">*</span></label>
                    <input type="text" id="fname" name="fname" class="formField"required>
                    <p class="error-message" id="invalid-fname"></p>
                </div>
                <div class="rowGroup">
                    <label for="lname" class="formLabel">LAST NAME <span style="color: red;">*</span></label>
                    <input type="text" id="lname" name="lname" class="formField" required>
                    <p class="error-message" id="invalid-lname"></p>
                </div>
            </div> <br>
            <div class="row">
                <div class="rowGroup" for="phone">
                    <label for="phone" class="formLabel">MOBILE PHONE <span style="color: red;">*</span></label>
                    <input type="tel" id="phone" name="phone" minlength="10" maxlength="10" pattern="[0-9]{10}"
                        class="formField" required>
                    <p class="error-message" id="invalid-phone"></p>
                </div>
                <div class="rowGroup">
                    <label for="email" class="formLabel">EMAIL ADDRESS <span style="color: red;">*</span></label>
                    <input type="email" id="email" name="email" class="formField" required>
                    <p class="error-message" id="invalid-email"></p>
                </div>
            </div> <br>
            <div class="row">
                <div class="rowGroup">
                    <label for="license" class="formLabel">DRIVER'S LICENSE NUMBER <span
                            style="color: red;">*</span></label>
                    <input type="text" id="license" name="license" class="formField" minlength="10" maxlength="10"
                        pattern="^D[0-9]{9}$" placeholder="DXXXXXXXXX" required>
                    <p class="error-message" id="invalid-license"></p>
                </div>
            </div> <br>
            <div class="row">
                <div class="rowGroup">
                    <label for="sDate" class="formLabel">START DATE <span style="color: red;">*</span></label>
                    <input type="date" name="startDate" id="startDate" value="<?= date('d-m-Y'); ?>"
                        min="<?= date('d-m-Y'); ?>" required>
                    <p class="error-message" id="invalid-sDate"></p>
                </div>
                <div class="rowGroup">
                    <label for="eDate" class="formLabel">END DATE <span style="color: red;">*</span></label>
                    <input type="date" name="endDate" id="endDate">
                    <p class="error-message" id="invalid-eDate"></p>
                </div>
            </div> <br>
            <div class="row">
                <div class="rowGroup">
                    <p id="rentalDays"></p>
                </div>
                <div class="rowGroup">
                    <p id="total"></p>
                </div>
            </div>
            <div class="row">
                <div style="text-align: center;">
                    <br><input id="submitButton" type="submit" name="submitForm" class="checkOut-btn" value="Submit" disabled="true">
                </div>
            </div>
        </form>
        <div id="response"></div>
    </div>
    <script>
        document.getElementById('checkoutForm').addEventListener('change', function (e) {
            event.preventDefault(); 
            const submitButton = document.getElementById("submitButton");
            const fname = document.getElementById("fname").value;
            const lname = document.getElementById("lname").value;
            const phone = document.getElementById("phone").value;
            const email = document.getElementById("email").value;
            const license = document.getElementById("license").value;
            const startDate = new Date(document.getElementById("startDate").value);
            const endDate = new Date(document.getElementById("endDate").value);
            const pricePerDay = "<?php echo $cars['pricePerDay']; ?>";

            if(!fname){
                document.getElementById('invalid-fname').textContent = "First Name required.";
                fnamewrongFormat = true;
            }
            else{
                document.getElementById('invalid-fname').textContent = "";
                fnamewrongFormat = false;
            }

            if(!lname){
                document.getElementById('invalid-lname').textContent = "Last Name required.";
                lnamewrongFormat = true;
            }
            else{
                document.getElementById('invalid-lname').textContent = "";
                lnamewrongFormat = false;
            }

            if(!/^\d{10}$/.test(phone)){
                document.getElementById('invalid-phone').textContent = "Invalid Phone Number";
                phonewrongFormat = true;
            }
            else{
                document.getElementById('invalid-phone').textContent = "";
                phonewrongFormat = false;
            }

            if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                document.getElementById('invalid-email').textContent = "Invalid email format.";
                emailwrongFormat = true;
            }
            else{
                document.getElementById('invalid-email').textContent = "";
                emailwrongFormat = false;
            }

            if (!/^D[0-9]{9}$/.test(license)) {
                document.getElementById('invalid-license').textContent = "Invalid license format. DXXXXXXXXX";
                licensewrongFormat = true;
            }
            else{
                document.getElementById('invalid-license').textContent = "";
                licensewrongFormat = false;
            }
            if (fnamewrongFormat || lnamewrongFormat || phonewrongFormat || emailwrongFormat|| licensewrongFormat|| !(startDate <= endDate)) {
                submitButton.disabled = true;
                document.getElementById('rentalDays').textContent = "ERROR";
                document.getElementById('total').textContent = "ERROR";
                return false;
            }
            else {
                submitButton.disabled = false;
                const diffTime = Math.abs(endDate - startDate);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                document.getElementById('rentalDays').textContent = `Rental Period: ${diffDays}`;
                const total = diffDays * pricePerDay;
                document.getElementById('total').textContent = `Total: $${total}`;
                
            }

        });
    </script>

</html>