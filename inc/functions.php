<?php

function CleanInput($input){
    return htmlspecialchars(trim($_POST[$input]));
}

// name validation
function validateName($name){ 
    if (!preg_match ("/^[a-zA-Z\s]+$/", $name) ) {  
        return true; 
    }else{  
        return false;
    } 
}

// email validation
function validateEmail($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return TRUE;
      }
}


// phone number validation
function validatePhone($phone){
    if (!preg_match ("/^[0-9]*$/", $phone) ){ 
        return TRUE; 
    }
}

// phone number check
function phone_number($number){
    $number = intval($number); //to numeric
    $number = "$number"; // to string
    $isValid = TRUE;

    if(str_starts_with($number, '7') && strlen($number) === 9){
        $number = "254$number";
    }else if(str_starts_with($number, '254') && strlen($number) === 12){
        $number = "$number";
    }else if(str_starts_with($number, '1') && strlen($number) === 9){
        $number = "254$number";
    }else if(str_starts_with($number, '01') && strlen($number) === 10){
        $number = "254".substr($number, 1);
    }else{
        $isValid = false;
    }

    return ['isValid' => $isValid, 'phone' => $number];
}

// check if it exist
function checkExist($exist, $value){
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT $value FROM users WHERE $value = '$exist'");
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($results && count($results)){
        $conn = null;
        return true;
    }

    $conn = null;
    return false;
}

// checking errrors if present

function HasErrors($error){
    foreach($error as $err => $value){
        if(!empty($value)){
            return TRUE;
        }
    }
}