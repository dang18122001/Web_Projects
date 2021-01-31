function calculate(rate) {
    var subtotal = document.getElementById("subtotal").value;
    if (subtotal == "") {
        document.getElementById("result").innerHTML = "Please enter the subtotal!";
        return;
    } else if (rate == "") {
        document.getElementById("result").innerHTML = "Please enter the rate!";
    } else {
        var values = "subtotal=" + subtotal + "&" + "rate=" + rate;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("result").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "Calculating.php?" + values, true);
        xmlhttp.send();
    }
}