function checkFunction() {
    var checkBox = document.getElementById("confirm");
    var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "inline";
  } else {
     text.style.display = "none";
  }
}

class florist {
    constructor(fname, lname, pass, id) {
        this.fname = fname;
        this.lname=lname;
        this.pass=pass;
        this.id=id;
    }
}

var florists=[];
florists.push(new florist('Dang','Huynh','Dang1234',"12348765"));
florists.push(new florist('Turik','Phan','Tp333',"31465899"));
florists.push(new florist('Alisa','Daly','Alida111',"47483425"));
florists.push(new florist('Erin','Bowden','Bowden24',"63378031"));
florists.push(new florist('Rosanna','Iles','haHaha44',"05482454"));
florists.push(new florist('Usamah','Maldonado','UM1728',"95061114"));

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

// Verification
function Verification() {
    var fn=document.getElementById('fname').value;
    var ln=document.getElementById('lname').value;
    var p=document.getElementById('pass').value;
    var ids=document.getElementById('id').value;
    var login = new florist(fn,ln,p,ids);

    for(var i=0;i<6;i++) {
        var check=florists[i];
        console.log(check);

        if(check.fname===login.fname && check.lname===login.lname && check.pass===login.pass && check.id===login.id)       
            return true;
    }
    return false;
}

var submit=document.getElementById('submit');
var reset=document.getElementById('reset');
submit.addEventListener('click',()=>{

    if(Validation()) {
        if(Verification()) {
        var x = document.getElementById('transaction');
        var i = x.selectedIndex;
        var message='Welcome User. Your Transaction is '+ x.options[i].text;
        alert(message);
        }
        else 
            alert('Account not Verified');
    }  
});

reset.addEventListener('click',()=>{
    document.getElementById('fname').value='';
    document.getElementById('lname').value='';
    document.getElementById('pass').value='';
    document.getElementById('id').value='';
    document.getElementById('phone').value='';
    document.getElementById('mail').value='';
});