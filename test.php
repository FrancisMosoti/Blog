<?php

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT DISTINCT users.name, users.id, posts.user_id FROM users INNER JOIN posts on users.id = posts.user_id");
    $stmt->execute();

    // set the resulting array to associative
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);




 }catch(PDOException $e) {
    
 }
