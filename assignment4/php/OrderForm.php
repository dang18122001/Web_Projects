<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placing New Order</title>
    <link rel="stylesheet" href="..\css\TFPWstyle.css">
    <script type="text/javascript" src="..\js\DataValidation.js"></script>
</head>
<body>
    <ul>
        <li><a href='https://web.njit.edu/~hd267/assignment4/php/TheFloristPotWeb.php'>Home</a></li>
        <li><a href='https://web.njit.edu/~hd267/assignment4/php/TheFloristPotWeb.php'>Search for Florist Record</a></li>
        <li><a href='https://web.njit.edu/~hd267/assignment4/php/OrderForm.php'>Place Order</a></li>
        <li><a href='https://web.njit.edu/~hd267/assignment4/php/UpdateOrderForm.php'>Update Order</a></li>
        <li><a href='https://web.njit.edu/~hd267/assignment4/php/CancelOrderForm.php'>Cancel Order</a></li>
        <li><a href='https://web.njit.edu/~hd267/assignment4/php/CreateAccountForm.php'>Create Customer Account</a></li>
    </ul>
    <div class="container">
        <h2>The Flowering Pot: Order Form</h2>
        <form action="PlacingOrder.php" onsubmit = "return OrderFormValidation()" method="POST">
            <label for="cfname">Customer First Name:</label><br>
            <input type="text" id="cfname" name="cfname" placeholder="Example: Mikael">
            <b>REQUIRED</b><br> 

            <label for="clname">Customer First Name:</label><br>
            <input type="text" id="clname" name="clname" placeholder="Example: Hicks">
            <b>REQUIRED</b><br> 

            <label for="cid">ID:</label><br>
            <input type="text" id="cid" name="cid" placeholder="Example: cus0001">
            <b>REQUIRED</b><br>

            <label for="type">Arrangement Type and Number</label><br>
            <input type="text" id="type" name="type" placeholder="Example: Centerpiece">
            <b>REQUIRED</b><br>

            <label for="date">Delivery Date:</label><br>
            <input type="date" id="date" name="date">
            <b>REQUIRED</b><br>

            <label for="address">Delivery Address:</label><br>
            <input type="text" id="address" name="address" placeholder="Example: 233 North Del Monte Road Anchorage AK 99504">
            <b>REQUIRED</b><br>

            <div class="button-box">
                <button type = "submit" name = "submit">Submit</button>
                <button type = "reset" name = "reset">Reset</button>
            </div>  
        </form>
    </div>

</body>
</html>