<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Order Form</title>
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
        <h2>The Flowering Pot: Cancel order Form</h2>

        <form action="CancelingOrder.php" onsubmit = "return CancelOrderFormValidation()" method="POST">
            <label for="cid">Customer ID:</label><br>
            <input type="text" id="cid" name="cid" placeholder="Example: cus0001">
            <b>REQUIRED</b><br> 

            <label for="order">Customer Order Number:</label><br>
            <input type="number" id="order" name="order" placeholder="Example: 12345678">
            <b>REQUIRED</b><br> 
            
            <div class="button-box">
                <button type = "submit" name = "submit">Submit</button>
                <button type = "reset" name = "reset">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>