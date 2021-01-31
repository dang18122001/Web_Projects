<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Florist Pot</title>
    <link rel="stylesheet" href="..\css\TFPWstyle.css">
    <script type="text/javascript" src="..\js\DataValidation.js"></script>
</head>
<body>
    <div class="container">
        <h2>The Flowering Pot</h2>
        <form action = "DisplayingFloristRecord.php" onsubmit = "return Validation()" method = "POST">
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname" placeholder="Example: Dang">
            <b>REQUIRED</b><br> 

            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lname" placeholder="Example: Huynh">
            <b>REQUIRED</b><br>

            <label for="pass">Password:</label><br>
            <input type="password" id="pass" name="pass" placeholder="Example: Dhuynh12">
            <b>REQUIRED</b><br>

            <label for="id">ID:</label><br>
            <input type="number" id="id" name="id" placeholder="Example: 12345678">
            <b>REQUIRED</b><br>

            <label for="phone">Phone number:</label><br>
            <input type="text" id="phone" name="phone" placeholder="Example: 900-558-8333">
            <b>REQUIRED</b><br>

            <label for="mail">Email:</label><br>
            <input type="email" id="mail" name="mail" placeholder="Example: asd@asd.com">
            <b id="text" style="display: none;">REQUIRED</b><br>

            <label for="confirm">Check the box to request an Email Confirmation</label>
            <input type="checkbox" id="confirm" name="confirm" onclick="checkFunction()"><br>

            Select a Transaction: 
            <select name="transaction" id="transaction">
                <option value="Search a Florist Records">Search a Florist Records</option>
                <option value="Place an Order">Place an Order</option>
                <option value="Update an Order">Update an Order</option>
                <option value="Cancel an Order">Cancel an Order</option>
                <option value="Register/Create an Account">Register/Create an Account</option>
            </select>

            <div class="button-box">
                <button type = "submit" name = "submit">Submit</button>
                <button type = "reset" name = "reset">Reset</button>
            </div>    
        </form>
    </div>
</body>
</html>
