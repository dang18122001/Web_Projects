<html>
<head>
</head>
<body>
    <?php
        // Get data
        $subtotal = $_GET['subtotal'];
        $rate = $_GET['rate'];

        // Calaulate gratuity and total
        $gratuity = $subtotal * $rate / 100;
        $total = $subtotal + $gratuity;

        // Echo result
        echo "The gratuity = ".$gratuity." and the total = ".$total;
    ?>
</body>
</html>