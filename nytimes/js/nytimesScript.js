// function to get and display date.
function dateDisplay() {
    // https://www.w3schools.com/js/js_date_methods.asp
    var d = new Date();
    var days = [ "Sunday", "Monday", "Tuseday", "Wednesday", "Thrusday", "Friday", "Saturday"];
    var months = ["January", "February", "March", "April", "May", "June", "July", 
        "August", "September", "October", "November", "December"];
    
    var date = days[d.getDay()] + ", " + months[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
    document.getElementById("date").innerHTML = date;
}