<?php

// $success = $title = $body = $user_id = $empty = '';
$user_id = '';

$user_id = $_SESSION['user']['id'];
function CleanInput($input){
    return htmlspecialchars(trim($_POST[$input]));
}



if($_SERVER["REQUEST_METHOD"] = "POST" && isset($_POST['submit'])){


    if(!isset($_POST['title']) || empty($_POST['title'])){
        if(!isset($_POST['content']) || empty($_POST['title'])){
            $empty = "ERROR! Can't add an empty post. Write something please.";
        }

    }else{
        $title = CleanInput('title');
        $body = CleanInput('content');
    }

if(empty($empty) && empty($success)){

require_once "../inc/conn.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo checkEmail();
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO posts (title, user_id, body)
    VALUES (:title, :user_id, :body)");

    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':body', $body);


    $stmt->execute();

    header("location:../home.php?info=added");

    
    } catch(PDOException $e) {
    $error = "FAILED TO SUBMIT DATA";
    }

    $conn = null;
}

}