<?php

    $upload = upload();
    $error = $fileName = "";

    if($upload === true){
    $error = "Sorry, your photo was not uploaded.";
    }else{
    $fileName = $upload;
    }




    $id = $_SESSION['user']['id'];

  // echo "no errors";
    require_once "inc/conn.php";
    
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = '$id'");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($result && (count($result) == 1)) {
        $user = $result[0];
        $email1 = $user['email'];
            // echo $fileName;

        $stm = $conn->prepare("INSERT INTO users(profile_photo) values (:photo) WHERE email = $email1");
        $stm->bindParam(':photo', $fileName);
        $stm->execute();

        echo "Your profile photo was successfully uploaded ";
        $conn = null;

    }

    $conn = null;
 }catch(PDOException $e) {
    
 }

 ?>