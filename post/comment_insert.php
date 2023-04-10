<?php
// $comment = "";
$errors = 

$error = [
    'comment' => ''
];

    $post_id = $text['id'];

 if(!isset($_POST['comment']) || empty($_POST['comment'])){
   $error['comment'] = "enter comment";
}else{
    $comment = htmlspecialchars(trim($_POST['comment']));
}

if(!HasErrors($errors)){
if($_SERVER["REQUEST_METHOD"] = "POST"){
// $user_id = null;

require_once "../inc/conn.php";

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
// echo checkEmail();
// prepare sql and bind parameters
$stmt = $conn->prepare("INSERT INTO comments (post_id, body) VALUES (:postid, :body)");

$stmt->bindParam(':postid', $post_id);
$stmt->bindParam(':body', $comment); 

$stmt->execute();

echo "comment added successfully";


} catch(PDOException $e) {
    // echo "Error: " . $e->getMessage();
    // echo "FAILED TO SUBMIT DATA";
    }

    $conn = null;

}

    
 }

