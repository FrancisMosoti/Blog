<?php

// $success = $title = $body = $user_id = $empty = '';
function CleanInput($input){
    return htmlspecialchars(trim($_POST[$input]));
}



if($_SERVER["REQUEST_METHOD"] = "POST" && isset($_POST['Done'])){


    if(!isset($_POST['tit']) || empty($_POST['tit']) && (!isset($_POST['cont']) || empty($_POST['cont'])) ){
            $empty = "ERROR! Can't add an empty post. Write something please.";
    }else{
        $tit = CleanInput('tit');
        $bod = CleanInput('cont');
    }


$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "blog";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];

            $stat = $conn->prepare("UPDATE posts SET title='$tit', set body = '$bod' WHERE id = $id");
            $stat->execute();
            die('hapa');

            
        }

            header("location:../home.php?edit=editted");




    
    } catch(PDOException $e) {
    $error = "FAILED TO EDIT DATA";
    }

        $conn = null;


}