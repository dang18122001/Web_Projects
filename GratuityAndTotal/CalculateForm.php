<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcalate Gratuity and Total</title>
    <script type="text/javascript" src="Calculate.js"></script>
</head>
<body>
    <div>
        <label for="subtotal">Please enter the subtotal:</label><br>
        <input type="number" id="subtotal" name="subtotal"><br>

        <label for="rate">Please enter the gratuity rate:</label><br>
        <input type="number" id="rate" name="rate" onkeyup="calculate(this.value)">
        <b>%</b><br>
    </div>
    <span id="result"><span>
</body>
</html>