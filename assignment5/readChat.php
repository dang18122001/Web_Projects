<html>
<head>
</head>
<body>
    <?php
        $sender = $_GET['sender'];

        // Create connection
        $conn = new mysqli("sql1.njit.edu", "hd267", "*********", "hd267");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from database
        $userData = $conn->query("SELECT `Chat_Content` FROM `Chat_Table` WHERE `User_Name`='$sender'");

        // Verify name and password
        $isVerified = true;
        if ($userData->num_rows == 0) {
            $isVerified = false;
            echo "".$sender." is not an app user!";
        }

        if ($isVerified) {
            while ($row = $userData->fetch_assoc()) {
                echo str_replace("\n", "<br>", $row['Chat_Content']);
            }
        }
    ?>
</body>
</html>