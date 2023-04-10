'use strict'

function validateform(){
    var firstpassword=document.querySelector('.password').value; 
    var x=document.querySelector('.email').value;
    var atposition=x.indexOf("@");  
    var dotposition=x.lastIndexOf("."); 

    if(firstpassword.length < 8){
        alert("password should be 8 characters and above");
    }

    
    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
        // alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition); 
        alert("Error! Invalid Email");
        return false;  
        } 
}