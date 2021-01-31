<html>
<head>
</head>
<body>
    <?php
        $name = $_GET['name'];
        $pass = $_GET['pass'];
        $chat = $_GET['chat'];

        // Create connection
        $conn = new mysqli("sql1.njit.edu", "hd267", "*********", "hd267");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from database
        $userData = $conn->query("SELECT * FROM `Chat_Table` WHERE `User_Name`='$name' AND `User_Password`='$pass'");

        // Verify name and password
        $isVerified = true;
        if ($userData->num_rows == 0) {
            $isVerified = false;
            echo "Wrong name and password!";
        }

        if ($isVerified) {
            $chatValue = str_replace("'","''",$chat);
            $update = $conn->query("UPDATE `Chat_Table` SET `Chat_Content`=CONCAT(`Chat_Content`, '\n', '$chatValue') 
                WHERE `User_Name`='$name' AND `User_Password`='$pass'");
            if ($update === TRUE) {
                echo "".$chat." sended!";
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $conn->close();
        }
    ?>
</body>
</html>