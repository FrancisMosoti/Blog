<?php

// $success = $title = $body = $user_id = $empty = '';
function CleanInput($input){
    return htmlspecialchars(trim($_POST[$input]));
}



if($_SERVER["REQUEST_METHOD"] = "POST"){


    if(!isset($_POST['title']) || empty($_POST['title'])){
        if(!isset($_POST['content']) || empty($_POST['title'])){
            $empty = "ERROR! Can't add an empty post. Write something please.";
        }

    }else{
        $title = CleanInput('title');
        $body = CleanInput('content');
    }

if(empty($empty) && empty($success)){

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "blog";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo checkEmail();
    // prepare sql and bind parameters
        if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            $stat = $conn->prepare("UPDATE posts SET title=$title, body=$body WHERE id = $id");
            $stat->execute();

            echo $stat->rowCount() . " records UPDATED successfully";
        }



    
    } catch(PDOException $e) {
    $error = "FAILED TO EDIT DATA";
    }

    $conn = null;
}

}