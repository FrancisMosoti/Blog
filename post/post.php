<?php
session_start();
 require("add.php");
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>NEW POST</title>
</head>
<body>
    <div class="container mx-2 mt-4 p-4 mx-auto border border-2 rounded">
        <?php
            
            if(!empty($empty)){
                echo '<div class="alert alert-danger p-1 text-center">'.$empty.'</div>';
            }
        ?>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <input type="text" placeholder="Blog title" name="title" class="form-control bg-light my-3 p-3">
            <textarea name="content" placeholder="Type your content body" id="" cols="20" rows="10" class="form-control bg-light my-5 p-4"></textarea>
            <button name="submit" class="btn btn-outline-success">Add Post</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>