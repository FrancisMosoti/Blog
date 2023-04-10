<?php
require("inc/conn.php");
require("inc/functions.php");
require("register_validate.php");


session_start();
if(isset($_SESSION['user'])){
    header("location:home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="C:\xampp\htdocs\Blog\CSS\style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Register</title>

    <style>
        body{
            /* padding: 50px 0; */
            box-sizing: border-box;
        }
        form{
            max-width: 500px;
            margin: auto auto;
        }
        
    </style>
</head>
<body class="bg-success pt-5">
    <div class="container">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="form-signup bg-light rounded p-4" method="post" onsubmit="return validateform()">
            <h2 class="text-center mb-4">Create Account</h2>
            <?php
            // if(empty($errors['error'])){

            // }
            if(!empty($success)){
                echo '<div class="alert alert-success p-1 text-center">';
                echo $success;
                echo '</div>';
            }else{
                echo '<div class="text-danger p-1 text-center">';
                echo $finalError['error'];
                echo '</div>';
            }
            ?>
            <!-- <?php var_dump($errors); ?>  -->
                <div class="form-group mb-3">
                    <input type="text" name="name" class="form-control name" placeholder="Enter Name">
                    <!-- <?php if(!empty($errors['name']) || ISSET($errors['name'])){
                        echo "<p class='text-danger'>".$errors['name'].'</p>';
                        $errors['name'] = ""; 
                        }
                        ?> -->
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="email" class="form-control email" placeholder="Enter Email">
                    <!-- <?php if(!empty($errors['email'])){echo "<p class='text-danger'>".$errors['email'].'</p>'; }?> -->
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="phone" class="form-control phone" placeholder="Phone Number">
                    <!-- <?php if(!empty($errors['phone'])){echo "<p class='text-danger'>".$errors['phone'].'</p>'; }?> -->
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" class="form-control password" placeholder="Enter Password">
                    <!-- <?php if(!empty($errors['password'])){echo "<p class='text-danger'>".$errors['password'].'</p>'; }?> -->
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password1" class="form-control password1" placeholder="Confirm Password">
                    <!-- <?php if(!empty($errors['password1'])){echo "<p class='text-danger'>".$errors['password1'].'</p>'; }?> -->
                </div>
                <div class="form-group mb-3">
                    <label for="">
                        <input type="checkbox" name="check" checked>
                        I agree to <a href="#">terms and conditions</a>
                    </label>
                    <!-- <?php if(!empty($errors['check'])){echo "<p class='text-danger'>".$errors['check'].'</p>'; }?> -->
                </div>
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-6">
                            <input type="submit" class="btn btn-primary" value="SUBMIT">
                        </div>
                        <div class="col-6">
                            <input type="reset" class="btn btn-primary" value="RESET">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <p>You have an account? <a href="login.php">Click to login</a></p>
                </div>
        </form>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="validation.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>

</body>
</html>