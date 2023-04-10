<?php

$name = $name1 = $email1 = $password1 = $email = $phone = $phone1 = $password  = $success= "";

$errors = [
    'name' => "",
    'email' => "",
    'phone' => "",
    'password' => "",
    'password1' => "",
    'check' => "",
];

$finalError= [
    'error' => ""
];

if($_SERVER["REQUEST_METHOD"] = "POST"){

// CHECKING NAME


if (!isset($_POST["name"]) || empty($_POST['name'])) {
    $errors['name'] = "Error! You didn't enter the Name";
}else{
    if(validateName($_POST['name'])){
        $errors['name'] = "Only alphabets and whitespace are allowed.";
    }else{
        $name = CleanInput('name');
    }
}


// email validation
if (!isset($_POST["email"]) || empty($_POST['email'])) {
    $errors['email'] = "Error! You didn't enter the Email";
}else{
    if(validateEmail($_POST['email'])){
        $errors['email'] = "Invalid Email Format";
    }else{
        $email = CleanInput('email');
        // check if  phone number exist
        $emailDups = checkExist($email, "email");
        if($emailDups){
            $errors['email'] = "Email exist...";
        }
    }
}


// phone nunber validation
if (!isset($_POST["phone"]) || empty($_POST['phone'])) {
    $errors['phone'] = "Error! You didn't enter the phone number";
}else{
    if(validatePhone($_POST['phone'])){
        $errors['phone'] = "Only numeric value is allowed.";
    }else{
        $phone = CleanInput('phone');

        $phoneValidation = phone_number($phone);
        if(!$phoneValidation['isValid']){
            $errors['phone'] = 'phone is invalid...';
        }else{
            $phone = $phoneValidation['phone'];

            // check if  phone number exist
            $phoneDups = checkExist($phone, "phone");
            if($phoneDups){
                $errors['phone'] = "phone number exist...";
            }
        }

    }
}



// password validation
if (!isset($_POST["password1"]) || empty($_POST['password1'])) {
    $errors['password1'] = "Error! You didn't enter the Password";
}


if (!isset($_POST["password"]) || empty($_POST['password'])) {
    $errors['password'] = "Error! You didn't enter the Password";
}else{
    $password = CleanInput('password');
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
}

// check terms and conditions
if (!isset($_POST["check"]) || empty($_POST['check'])) {
    $errors['check'] = "Agree to terms and conditions";
}

// var_dump($errors);

if(!HasErrors($errors)){
require_once "inc/conn.php";
    
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
    // echo checkEmail();
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (:name, :email, :phone, :password)");

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email); 
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':password', $password_hash);

    $stmt->execute();


    $success = "Data has been submitted successfully";
    header('location:login.php');
    // echo $success;


    
    } catch(PDOException $e) {
    // echo "Error: " . $e->getMessage();
    // echo "FAILED TO SUBMIT DATA";
    }

    $conn = null;
} else{
    $finalError['error'] = "Fill all the fields please";
}

}