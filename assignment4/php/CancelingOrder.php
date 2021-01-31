<html>
<head>
    <link rel="stylesheet" href="..\css\TFPWstyle.css">
</head>
<body>
    <?php
        // Start the session
        session_start();

        // Create connection
        $conn = new mysqli("sql1.njit.edu", "hd267", "Ngothihue154*", "hd267");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from user
        $cid = $_POST['cid'];
        $_SESSION['cancelID'] = $cid;
        $order = $_POST['order'];
        $_SESSION['cancelOrder'] = $order;

        // Get data from database
        $orderData = $conn->query("SELECT * FROM `Orders` WHERE `Customer_ID`='$cid' AND `Order_Number`='$order'");

        // verification
        if ($orderData->num_rows != 1) {
            echo '<script>alert("Order did not exist! Please check your information or place a new order.");
            window.location.href="CancelOrderForm.php";</script>';
        }
        $conn->close();
    ?>

    <div class="container">
        You are about to CANCEL this order. Are you sure you want to cancel?
        <form action="DoCancel.php" method = "POST">
            <button type = "submit" name = "ok">Ok</button>
            <button type = "submit" name = "cancel">Cancel</button>
        </form>
    </div>
</body>
</html>