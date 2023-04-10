'use strict'

function validateform(){  
    var name=document.querySelector('.name').value;
    var firstpassword=document.querySelector('.password').value;  
    var secondpassword=document.querySelector('.password1').value; 
    var phone = document.querySelector('.phone').value;  
    var x=document.querySelector('.email').value;
    var atposition=x.indexOf("@");  
    var dotposition=x.lastIndexOf(".");  
    // var password=document.myform.password.value;  
      
    // check if name is null 
    if (name==null || name==""){  
      alert("Name can't be blank");  
      return false;  
    }


// password check if they match
    if(firstpassword!=secondpassword){  
        alert("password must be same!");
        return false;    
    } 

    if(firstpassword.length < 8 && secondpassword.length < 8){
        alert("password should be 8 characters and above");
    }


    // phone number length
    if(phone.length < 10 ){
        alert("phone number should have 10 digits and above");
    }



    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
    // alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition); 
    alert("Error! Invalid Email");
    return false;  
    }  

    } 