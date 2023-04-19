<?php

session_start();
if(isset($_SESSION['user'])){
    header("location:home.php");
}

require_once "inc/conn.php";
require("inc/functions.php");
require("validateLOGIN.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Login</title>

    <style>
        body{
            padding: 150px 0;
        }
        form{
            max-width: 400px;
            margin: 0 auto;
        }
    </style>
</head>
<body class="bg-success">
    <div class="container">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="form-signup bg-light rounded p-4" onsubmit="return validateform()">

            <h2 class="text-center mb-3">Login</h2>
            <?php
            if(!empty($err)){
                echo '<div class="alert alert-danger p-1 text-center">';
                echo $err;
                echo '</div>';
            }
            ?>

                <div class="form-group mb-3">
                    <input type="text" name="email" class="form-control email" placeholder="Enter Email" id="">
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" class="form-control password" placeholder="Enter Password" id="">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember-me">
                    <label class="form-check-label" for="remember-me">Remember me</label>
                </div>

                <div class="form-group mb-3">
                    <div class="row">
                        <div class="text-center col-6">
                            <input type="submit" class="btn btn-primary" value="SUBMIT">
                        </div>
                        <div class="text-center col-6">
                            <input type="reset" class="btn btn-primary" value="RESET">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <p>You don't have an account? <a href="register.php">Click to register</a></p>
                </div>
        </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="validation.js"></script>
</body>
</html>