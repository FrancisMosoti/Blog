<?php
 require "../inc/functions.php"; 
 require("viewlogic.php");
 require("../test.php"); 
//  require("comment_view.php");


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
<body class="bg-light">
    <div class="container mt-4 ">
        <a href="../home.php">Go Back</a>
        <?php foreach($results as $text){?>
            <div>
                <h1 class="bg-success mb-3 p-3"><?php echo $text['title']; ?></h1>
            </div>
            <div>
                <p class="text-dark fs-5"><?php echo $text['body']; ?></p>
            </div>

            <div>
                <p class="text-success fs-6">Posted On : <?php echo $text['created_at']; ?></p>
            </div>
            <!-- <div> -->
                <p class="text-dark fs-6">BY:<?php
                    foreach ($res as $value){
                    if($text['user_id'] === $value['id']){
                    echo $value['name'];
                    }
                    }
                     ?></p>
            <!-- </div> -->
        <?php }?>

        <!-- comment form -->
        

        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="form-signup bg-light rounded p-4" method="post" >
            <div class="input-group mb-3">
                <input type="text" name="comment" class="form-control" placeholder="Leave a comment">
                <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon2">Add</button>
            </div>
        </form>

        <!-- comments display -->
        <!-- <p class="fs-5">comments</p>
        <?php foreach($res as $body){?>

            <div class="col-sm-12">
                <div class="card m-2">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $body['post_id']; ?></h5>
                    <p class="card-text"><?php echo $body['body']; ?></p>
                </div>
                </div>
            </div>
        <?php }?> -->


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>