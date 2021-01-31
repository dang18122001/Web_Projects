<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <link rel="stylesheet" href="ChatAppStyle.css">
    <script type="text/javascript" src="ChatAppScripts.js"></script>
</head>
<body>
    <div class="container">
        <h2>Names of people who joined the chat application.</h2>
        <?php
            // Create connection
            $conn = new mysqli("sql1.njit.edu", "hd267", "********", "hd267");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get data from database
            $userName = $conn->query("SELECT `User_Name` FROM `Chat_Table`");
            
            // Display data
            echo "<table border='1'>";

            if ($userName->num_rows > 0) {
                // output data of each row
                while($row = $userName->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['User_Name'] . "</td>";
                    echo "</tr>";
                }
            echo "</table>";

            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
    </div>

    <div class="container">
        <h2>Chat Box</h2>
        <form action="">
            <label for="name">Enter your name:</label><br>
            <input type="text" id="name" name="name" placeholder="Example: joe">
            <b>REQUIRED</b><br>

            <label for="pass">Password:</label><br>
            <input type="password" id="pass" name="pass" placeholder="Example: 007">
            <b>REQUIRED</b><br>

            <label for="chat">Type in the chat content and HIT ENTER to send:</label><br>
            <input type="text" id="chat" name="chat" onkeyup="updateChat(event)">
        </form>
        <span id="updateResult"></span>
    </div>

    <div class="container">
        <h2>Read Chat Box</h2>
            <p>Type in valid name and HIT ENTER to receive chat. <br>After that, the chat will be automatically updated.</p>
            <input type="text" id="sender" name="sender">
            <b>REQUIRED</b><br>
        <div class="container" id="readChat"></div>
    </div>
    
    <script> 
        var myVar;   
        var input = document.getElementById("sender");
        input.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                var values = "sender=" + input.value;
                clearInterval(myVar);
                myVar = setInterval(() => {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var currentChat =  document.getElementById("readChat").value;
                            if (currentChat != this.responseText) {
                                document.getElementById("readChat").innerHTML = this.responseText;
                            }
                        }
                    };
                    xmlhttp.open("GET", "readChat.php?" + values, true);
                    xmlhttp.send();
                }, 1000);
            }
        });
    </script>
</body>
</html>