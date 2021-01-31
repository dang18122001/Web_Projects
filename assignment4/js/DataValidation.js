function checkFunction() {
    var checkBox = document.getElementById("confirm");
    var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "inline";
  } else {
     text.style.display = "none";
  }
}

//Validation
function Validation() {
    // All required
    if(!document.getElementById('fname').value) {
        alert('First name is empty!');
        return false;
    }

    if(!document.getElementById('lname').value) {
        alert('Last name is empty!');
        return false;
    }

    if(!document.getElementById('pass').value) {
        alert('Password is empty!');
        return false;
    }

    if(!document.getElementById('id').value) {
        alert('ID is empty!');
        return false;
    }

    if(!document.getElementById('phone').value) {
        alert('Phone number is empty!');
        return false;
    }

    var checkBox = document.getElementById("confirm").checked;
    if(!document.getElementById('mail').value && checkBox == true) {
        alert('E-mail is required!');
        return false;
    }

    // Individual validation
    // Password Validation
    var pass=document.getElementById('pass').value;
    if(pass.length>8) {
        alert('Password length exceeds 8!');
        return false;
    }

    var cap=0,num=0;
    for(var i=0;i<pass.length;i++) {
        if(!isNaN(pass.charAt(i)))
        num++;
        else if(pass.charAt(i)==pass.charAt(i).toUpperCase())
        cap++;        
    }

    if(num==0) {
        alert('No number in password!');
        return false;
    }

    if(cap==0) {
        alert('No Capital Letter!');
        return false;
    }

    // ID validation
    var idNum = document.getElementById('id').value;
    if(idNum.length!==8) {
        alert('ID length is not equal to 8!');
        return false;
    }

    // Phone Number validation
    var phone=document.getElementById('phone').value;
    if(phone.length !== 12) {
        alert('Invalid phone number! Your phone number must be delineated either by spaces or dashes.');
        return false;        
    }


    else {
        if (phone.charAt(3) !== ' ' && phone.charAt(3) !== "-") {
            alert('Invalid phone number!123');
            return false;
        }
        
        if (phone.charAt(7) != " " && phone.charAt(7) != "-") {
            alert('Invalid phone number!12334');
            return false;
        }

        if(phone.charAt(3) !== phone.charAt(7)) {
            alert('Improper delimetter! The two delimeters must both be spaces or dashes.');
            return false;
        }

        var n=0;
        for(var i=0; i<12; i++) {
            if (i !== 3 && i !== 7)
                if (!isNaN(phone.charAt(i)))
                    n++;
        }

        if(n===10) {
            console.log('ok');
        }
        else {
            alert('Invalid phone number!');
            return false;
        }        
    }

    // Email validation
    var mail=document.getElementById('mail').value;
    var check = document.getElementById("confirm").checked;
    if(check == true) {
        if(mail.indexOf('@')!==mail.lastIndexOf('@')) {
            alert('Multiple @ present. Invalid Mail');
            return false;
        }

        var domain=mail.substring(mail.indexOf('.'));
        if(domain.length < 3 || domain.length > 5) {
            alert('Invalid email!');
            return false;
        }
    }
    return true;
}

// Validation for Order Form
function OrderFormValidation() {
    // All required
    if(!document.getElementById('cfname').value) {
        alert('First name is empty!');
        return false;
    }

    if(!document.getElementById('clname').value) {
        alert('Last name is empty!');
        return false;
    }

    if(!document.getElementById('cid').value) {
        alert('ID is empty!');
        return false;
    }

    if(!document.getElementById('type').value) {
        alert('Type of arrangement is empty!');
        return false;
    }

    if(!document.getElementById('date').value) {
        alert('Delivery date is empty!');
        return false;
    }

    if(!document.getElementById('address').value) {
        alert('Delivery address is empty!');
        return false;
    }

    // Validate customer id
    var id = document.getElementById('cid').value;
    if (!id.startsWith('cus')) {
        alert('Your ID must be started with "cus"!');
        return false;
    }

    // validate date
    var date = document.getElementById('date').value;
    date = new Date(date);
    var current = new Date();

    if (date < current) {
        alert('Please enter the date after today!');
        return false;
    }
}

// Validation for Create Account Form
function CreateAccountFormValidation() {
    // All required
    if(!document.getElementById('cfname').value) {
        alert('First name is empty!');
        return false;
    }

    if(!document.getElementById('clname').value) {
        alert('Last name is empty!');
        return false;
    }
}

// validation for Cancel An Order
function CancelOrderFormValidation() {
    if(!document.getElementById('cid').value) {
        alert('ID is empty!');
        return false;
    }

    if(!document.getElementById('order').value) {
        alert('Order number is empty!');
        return false;
    }

    // Validate customer id
    var id = document.getElementById('cid').value;
    if (!id.startsWith('cus')) {
        alert('Your ID must be started with "cus"!');
        return false;
    }

    // Validate Order number
    var idNum = document.getElementById('order').value;
    if(idNum.length!==8) {
        alert('ID length is not equal to 8!');
        return false;
    }
}

// validation for Update Order Form
function UpdateOrderFormValidation() {
    if(!document.getElementById('cid').value) {
        alert('ID is empty!');
        return false;
    }

    if(!document.getElementById('order').value) {
        alert('Order number is empty!');
        return false;
    }

    if(!document.getElementById('update').value) {
        alert('Your update information is empty!');
        return false;
    }

    // Validate customer id
    var id = document.getElementById('cid').value;
    if (!id.startsWith('cus')) {
        alert('Your ID must be started with "cus"!');
        return false;
    }

    // Validate Order number
    var idNum = document.getElementById('order').value;
    if(idNum.length!==8) {
        alert('ID length is not equal to 8!');
        return false;
    }
}