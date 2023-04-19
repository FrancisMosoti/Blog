<?php


$email1 = $password = $err = $name = "";

$errors = [
    'email' => '',
    'password' => ''
];




if($_SERVER["REQUEST_METHOD"] = "POST"){
// email validation
if (!isset($_POST["email"]) || empty($_POST['email'])) {
    $errors['email'] = "Error! You didn't enter the Email";
}else{
    if(validateEmail($_POST['email'])){
        $errors['email'] = "Invalid Email Format";
    }else{
        $email = CleanInput('email');
    }
}

// password validation
if (!isset($_POST["password"]) || empty($_POST['password'])) {
    $errors['password'] = "Error! You didn't enter the Password";
}else{
    $password = CleanInput('password');
    // $password_hash = password_hash($password, PASSWORD_DEFAULT);
}

if(!HasErrors($errors)){
    //check if session exists
if (isset($_COOKIE['userid'])) {
    $userid = $_COOKIE['userid'];

    echo "SESSION IS SET";
    

    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "blog";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=3306", $username, $dbpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $stmt = $conn->prepare("SELECT * FROM users WHERE id =$userid");
        $stmt->execute();
      
        // set the resulting array to associative
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        if ($results && (count($results) == 1)) {
            $user = $results[0];
            $_SESSION['user'] = $user;
            header("Location: home.php"); // redirect to home page
        }

        $login_success = false;

    } catch(PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    
 }
    
    // echo "no errors";
    
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = '$email'");
    $stmt->execute();

    // set the resulting array to associative
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($results && (count($results) == 1)) {
        $user = $results[0];

        $user_password_hash = $user['password'];

        if (password_verify($password, $user_password_hash)) { //successfull login
            $login_success = true;

            $_SESSION['user'] = $user; // create session data for logged in user

            if ($_POST['remember'] == 'on') {
                setcookie('userid', $user['id'], time() - (86400 * 30), "/");
            }
            header("Location:home.php"); // redirect to home page
        }



    }
 }catch(PDOException $e) {
    
 }



}

// else{
//     echo "has errors";
// }
}