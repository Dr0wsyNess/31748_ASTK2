<!DOCTYPE html>
<html lang="en">
     <div class="container" >
        <div class="deliveryDetail">
            <h1 style="text-align: center;">Delivery Details</h1>
            <form method="post" action="confirmed.php">
                <div class="row">
                    <div class="rowGroup">
                        <label for="fname" class="formLabel">FIRST NAME <span style="color: red;">*</span></label>
                        <input type="text" id="fname" name="fname" class="formField" required>
                    </div>
                    <div class="rowGroup">
                        <label for="lname" class="formLabel">LAST NAME <span style="color: red;">*</span></label>
                        <input type="text" id="lname" name="lname" class="formField" required>
                    </div>
                </div> <br>
                <div class="row">
                    <div class="rowGroup" for="phone">
                        <label for="phone" class="formLabel">MOBILE PHONE <span style="color: red;">*</span></label>
                        <input type="tel" id="phone" name="phone" minlength="10" maxlength="10" pattern="[0-9]{10}" class="formField" required>
                    </div>
                    <div class="rowGroup">
                        <label for="email" class="formLabel">EMAIL ADDRESS <span style="color: red;">*</span></label>
                        <input type="email" id="email" name="email" class="formField" required>
                    </div>
                </div> <br>
                <div class="row">
                    <div class="rowGroup">
                        <label for="license" class="formLabel">DRIVER'S LICENSE NUMBER <span style="color: red;">*</span></label>
                        <input type="text" id="license" name="license" class="formField" required>
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
                <div style="text-align: center;">
                    <br><input type="submit" name="submitForm" class="checkOut-btn" value="Submit">
                </div>
            </form>
        </div>
</html>