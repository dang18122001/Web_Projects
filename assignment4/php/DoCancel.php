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

        $cid = $_SESSION['cancelID'];
        $order = $_SESSION['cancelOrder'];

        if(isset($_POST['ok'])) { 
            // Cancel order
            $cancel = $conn->query("DELETE FROM `Orders` WHERE `Order_Number` = '$order' AND `Customer_ID` = '$cid'");

            if ($cancel === TRUE) {
                echo '<script>alert("Order cancelled successfully!");
                    window.location.href="CancelOrderForm.php";</script>';
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } 
        if(isset($_POST['cancel'])) { 
            header('Location: CancelOrderForm.php');
        } 
    ?>
</body>
</html>