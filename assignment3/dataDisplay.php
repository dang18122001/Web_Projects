<html>
<head>
    <link rel="stylesheet" href="css/TFPstyle.css">
</head>
<body>
    <div class="container">
        <h2>The Flowering Pot</h2>
        <div>
            <?php
                // Create connection
                $conn = new mysqli("sql1.njit.edu", "hd267", "********", "hd267");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
            
                if (isset($_GET['FloristDB'])) {
                    $sql = "SELECT * FROM Florists";
                    $result = $conn->query($sql);

                    echo "<table border='1'>
                    <tr>
                        <th>Florist ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Password</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                    </tr>";

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['Florist_ID'] . "</td>";
                            echo "<td>" . $row['First_Name'] . "</td>";
                            echo "<td>" . $row['Last_Name'] . "</td>";
                            echo "<td>" . $row['Password'] . "</td>";
                            echo "<td>" . $row['Email_Address'] . "</td>";
                            echo "<td>" . $row['Phone_Number'] . "</td>";
                            echo "</tr>";
                        }
                    echo "</table>";

                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                }
                
                else if (isset($_GET['CustomerDB'])) {
                    $sql = "SELECT * FROM Customers";
                    $result = $conn->query($sql);

                    echo "<table border='1'>
                    <tr>
                        <th>Customer ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>";

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['Customer_ID'] . "</td>";
                            echo "<td>" . $row['First_Name'] . "</td>";
                            echo "<td>" . $row['Last_Name'] . "</td>";
                            echo "</tr>";
                        }
                    echo "</table>";

                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                }

                else {
                    $sql = "SELECT * FROM Orders";
                    $result = $conn->query($sql);

                    echo "<table border='1'>
                    <tr>
                        <th>Order Number</th>
                        <th>Type of Arrangement</th>
                        <th>Delivery Date</th>
                        <th>Delivery Address</th>
                        <th>Customer ID</th>
                        <th>Florist ID</th>
                    </tr>";

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['Order_Number'] . "</td>";
                            echo "<td>" . $row['Type_of_Arrangement'] . "</td>";
                            echo "<td>" . $row['Delivery_Date'] . "</td>";
                            echo "<td>" . $row['Delivery_Address'] . "</td>";
                            echo "<td>" . $row['Customer_ID'] . "</td>";
                            echo "<td>" . $row['Florist_ID'] . "</td>";
                            echo "</tr>";
                        }
                    echo "</table>";

                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                }
            ?>
        </div>

        <div>
            <button id="homeButton">Home</button>
        </div>
    </div>
    
    <script type="text/javascript">
        document.getElementById("homeButton").onclick = function () {
            location.href = "TheFloristPotDB.php";
        };
    </script>
</body>
</html>
