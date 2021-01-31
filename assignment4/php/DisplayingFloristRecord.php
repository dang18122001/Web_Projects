<html>
<head>
    <link rel="stylesheet" href="..\css\TFPWstyle.css">
</head>
<body>
    <?php
        // Start the session
        session_start();

        // Create connection
        $conn = new mysqli("sql1.njit.edu", "hd267", "*", "hd267");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from user's input.
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pass = $_POST['pass'];
        $_SESSION['id'] = $_POST['id'];
        $id = $_SESSION['id'];

        // Get data from database.
        $sql = "SELECT * FROM `Florists` WHERE `Florist_ID`= '$id' AND `First_Name` = '$fname' AND 
            `Last_Name` = '$lname' AND `Florist_Password` = '$pass'";
        $result = $conn->query($sql);

        // Verification
        if ($result->num_rows == 0) {
            echo '<script>
            alert("Account not verified!");
            window.location.href="TheFloristPotWeb.php";
            </script>';
        }

        $choice = $_POST['transaction'];
        if ($choice == 'Search a Florist Records') {
            $floristData = $conn->query("SELECT Florists.`First_Name` as Florist_First_Name, Florists.`Last_Name` as Florist_Last_Name, Florists.`Florist_ID`, Florists.`Phone_Number`, Florists.`Email_Address`,
            Customers.`First_Name`, Customers.`Last_Name`, 
            Orders.`Type_of_Arrangement`, Orders.`Delivery_Date`, Orders.`Delivery_Address` 
            FROM Orders INNER JOIN Florists ON Orders.`Florist_ID`=Florists.`Florist_ID` 
            INNER JOIN Customers ON Orders.`Customer_ID` = Customers.`Customer_ID` 
            WHERE Florists.`Florist_ID` = '$id'");

            echo "<ul>
                    <li><a href='https://web.njit.edu/~hd267/assignment4/php/TheFloristPotWeb.php'>Home</a></li>
                    <li><a href='https://web.njit.edu/~hd267/assignment4/php/TheFloristPotWeb.php'>Search for Florist Record</a></li>
                    <li><a href='https://web.njit.edu/~hd267/assignment4/php/OrderForm.php'>Place Order</a></li>
                    <li><a href='https://web.njit.edu/~hd267/assignment4/php/UpdateOrderForm.php'>Update Order</a></li>
                    <li><a href='https://web.njit.edu/~hd267/assignment4/php/CancelOrderForm.php'>Cancel Order</a></li>
                    <li><a href='https://web.njit.edu/~hd267/assignment4/php/CreateAccountForm.php'>Create Customer Account</a></li>
                </ul>";

            echo "<h2>The Flowering Pot</h2>";
            echo "<table border='1'>
            <tr>
                <th>Florist First Name</th>
                <th>Florist Last Name</th>
                <th>Florist ID</th>
                <th>Phone Number</th>
                <th>Email Address</th>
                <th>Customer First Name</th>
                <th>Customer Last Name</th>
                <th>Items Ordered</th>
                <th>Delivery Date</th>
                <th>Delivery Address</th>
            </tr>";

            if ($floristData->num_rows > 0) {
                // output data of each row
                while($row = $floristData->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['Florist_First_Name'] . "</td>";
                    echo "<td>" . $row['Florist_Last_Name'] . "</td>";
                    echo "<td>" . $row['Florist_ID'] . "</td>";
                    echo "<td>" . $row['Phone_Number'] . "</td>";
                    echo "<td>" . $row['Email_Address'] . "</td>";
                    echo "<td>" . $row['First_Name'] . "</td>";
                    echo "<td>" . $row['Last_Name'] . "</td>";
                    echo "<td>" . $row['Type_of_Arrangement'] . "</td>";
                    echo "<td>" . $row['Delivery_Date'] . "</td>";
                    echo "<td>" . $row['Delivery_Address'] . "</td>";
                    echo "</tr>";
                }
            echo "</table>";

            } else {
                echo "0 results";
            }
            $conn->close();
        }
        
        else if ($choice == 'Place an Order') {
            header ('Location: OrderForm.php');
        }

        else if ($choice == 'Update an Order') {
            header ('Location: UpdateOrderForm.php');
        }

        else if ($choice == 'Cancel an Order') {
            header ('Location: CancelOrderForm.php');
        }

        else {
            header ('Location: CreateAccountForm.php');
        }
    ?>
</body>
</html>