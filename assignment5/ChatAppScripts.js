function updateChat(event) {
    var name = document.getElementById("name").value;
    var pass = document.getElementById("pass").value;
    var chat = document.getElementById("chat").value;
    if (name.length == 0 || pass.length == 0) {
        document.getElementById("updateResult").innerHTML = "Please enter your name and password!"
    } else {
        if (chat.length == 0) 
            return;
        else {
            var charCode = (typeof event.which === "number") ? event.which : event.keyCode;
            if (charCode === 13) {
                event.preventDefault();
                var values = "name=" + name + "&pass=" + pass + "&chat=" + chat;
                event.currentTarget.value = "";
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("updateResult").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "updateChat.php?" + values, true);
                xmlhttp.send();
            }
        }
    }
}
