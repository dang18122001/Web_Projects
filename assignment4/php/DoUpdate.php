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

        $cid = $_SESSION['cid'];
        $order = $_SESSION['order'];
        $update = $_SESSION['update'];

        if(isset($_POST['ok'])) { 
            $updateSql = $conn->query("UPDATE `Orders` SET `Type_of_Arrangement`='$update' 
            WHERE `Order_Number` = '$order' AND `Customer_ID` = '$cid'");
        
            if ($updateSql === TRUE) {
                echo '<script>alert("Record updated successfully!");
                    window.location.href="UpdateOrderForm.php";</script>';
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $conn->close();
        } 
        if(isset($_POST['cancel'])) { 
            header('Location: UpdateOrderForm.php');
        } 
    ?>
</body>
</html>