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

        // Get user's data
        $cfname = $_POST['cfname'];
        $clname = $_POST['clname'];
        $cid = $_POST['cid'];
        $type = $_POST['type'];
        $date = $_POST['date'];
        $address = $_POST['address'];

        // Get data from database
        $sql = "SELECT * FROM `Customers` WHERE `Customer_ID`='$cid' AND `First_Name`='$cfname' 
            AND `Last_Name`='$clname'";
        $result = $conn->query($sql);

        // Verification
        if ($result->num_rows == 0) {
            echo '<script>
            alert("Account not verified! Please check again or create new account!");
            window.location.href="OrderForm.php";
            </script>';
        }
        
        // Generrate order number 
        do {
            $orderNum = rand(10000000, 99999999);
            $num = $conn->query("SELECT * FROM `Orders` WHERE `Order_Number`='$orderNum'");
        } while ($num->num_rows == 1);

        // Choose a florist to take the order.
        $chosenID = $_SESSION['id'];

        // Update new order
        $sql = "INSERT INTO `Orders` (`Order_Number`, `Type_of_Arrangement`, 
        `Delivery_Date`, `Delivery_Address`, `Customer_ID`, `Florist_ID`)";
        $sql = $sql." VALUES ('".$orderNum."', '".$type."', '".$date."', '".$address."', '".$cid."', '".$chosenID."')";
        
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("New order created successfully!");
            window.location.href="OrderForm.php";</script>';
        } else {
            echo "Error: " . $conn->error;
        }
        $conn->close();
    ?>
</body>
</html>