<html>
<head>
    <link rel="stylesheet" href="..\css\TFPWstyle.css">
</head>
<body>
    <?php
        // Create connection
        $conn = new mysqli("sql1.njit.edu", "hd267", "Ngothihue154*", "hd267");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from user
        $cfname = $_POST['cfname'];
        $clname = $_POST['clname'];
        $cid = $_POST['cid'];

        // Generate new ID number.
        $IDnumber = $conn->query("SELECT `Customer_ID` FROM `Customers`");
        $order = $IDnumber->num_rows + 1;
        if ($order < 100) {
            $newID = "cus00".strval($order);
        }
        else if ($order < 1000) {
            $newID = "cus0".strval($order);
        }
        else {
            $newID = "cus".strval($order);
        }
        
        // Create new account.
        $insert = $conn->query("INSERT INTO `Customers`(`Customer_ID`, `First_Name`, `Last_Name`) 
            VALUES ('$newID','$cfname','$clname')");

        $stringNewID = "Account created successfully! Your ID is: ".$newID;

        if ($insert === TRUE) {
            echo '<script>alert("'.$stringNewID.'");
                window.location.href="CreateAccountForm.php";</script>';
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    ?>
</body>
</html>