<?php
 require("viewlogic.php");
 require("editlogic.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>EDIT POST</title>
</head>
<body>
    <div class="container mt-4 p-4 mx-auto border border-2 rounded">
        <?php
            
            if(!empty($empty)){
                echo '<div class="alert alert-danger p-1 text-center">'.$empty.'</div>';
            }
        ?>

        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

        <?php foreach($results as $text){?>
            <input type="text" placeholder="Blog title" value="<?php echo $text['title']; ?>" name="tit" class="form-control bg-light my-3 p-3">
            <textarea name="cont" value="<?php echo $text['body']; ?>" placeholder="Type your content body" id="" cols="20" rows="10" class="form-control bg-light my-5 p-4"></textarea>
            <button name="Done" class="btn btn-outline-success">Done!</button>
            <?php }?>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>