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
    $pass = "";
    $dbname = "blog";


  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
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

// ago logic implementation


function agoLogic($timestamp){
    $time = new DateTime('now', new DateTimeZone('Africa/Nairobi'));
    $now = strtotime($time->format('Y-m-d H:i:s'));
    $sec =floor($now - $timestamp);
    $min = floor($sec / 60);
    $hrs =floor($min / 60);
    $days = floor($hrs / 24);
    $month = floor($days / 30);
    $year = floor($month / 12);

    if($month > 12){
        return $year." years ago";
    }else if($days > 30){
        return $month." months ago";
    }elseif($hrs > 24){
        return $days." days ago";
    }else if($min > 60){
        return $hrs." hours ago";
    }else if($sec > 60){
        return $min." minutes ago";
    }else if($sec > 0){
        return $sec." seconds ago";
    }else{
        return $sec;
    }

}