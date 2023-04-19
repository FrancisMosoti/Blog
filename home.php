<?php
session_start();

if(!isset($_SESSION['user'])){
    header("location:login.php");
}

require("post/logic.php");
require("upload.php");
require("updateImg.php");
require("test.php");
require("inc/functions.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Home</title>
    <style>
        .logo{
            margin-right: auto;
        }
        .logout-btn{
          display: inline-block;
        }

    </style>
</head>
<body>





<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <div class="logo">
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Profile details
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li class="text-success"><a class="dropdown-item" href="#"><?php echo "NAME : ".$_SESSION['user']['name'];?></a></li>
        <li><a class="dropdown-item" href="#"><?php echo "EMAIL : ".$_SESSION['user']['email'];?></a></li>
        <li><a class="dropdown-item" href="#"><?php echo "PHONE NUMBER : ".$_SESSION['user']['phone'];?></a></li>
        <li><a class="dropdown-item text-primary fs-5 fw-bolder" href="./logout.php">Log out</a></li>
      </ul>
    </div>
    </div>
  </div>
</nav>

<div class="container">

<?php if(isset($_REQUEST['info'])){?> 
  <div class="alert alert-success p-1 text-center">
    <p>Your article has been submitted successfully</p>
  </div>
<?php }?>

<?php if(isset($_REQUEST['delete'])){?> 
  <div class="alert alert-success p-1 text-center">
    <p>Your article has been deleted successfully</p>
  </div>
<?php }?>
    <div class="d-flex">
        <div class="mt-2">
          <a href="post/post.php" class="btn btn-outline-success">+ Create a new post</a>
      </div>

     <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-success mt-2 mx-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
Upload Profile photo:
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Profile Photo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- errors -->
    <span class="text-danger m-2">
       <?php echo $error;?>
</span>

    <!--  -->

    </div>

    <div class="row">

    <?php foreach($results as $row){?>
      <div class="col-sm-12">
        <div class="card m-2">
          <div class="card-body">
            <h5 class="card-title mx-3"><?php echo $row['title']; ?></h5>
            <!-- <p class="card-text"><?php echo $row['body']; ?></p> -->


            <!-- flex start -->
           <div class="d-flex flex-row">
             <p class="text-success mx-3"><i class="fa fa-clock-o"></i>
                  <?php
                  $timestamp = strtotime($row['created_at']);
                  echo agoLogic($timestamp);
                   
                  ?>
              </p>
            <p class="text-primary"><span class="text-dark">BY:</span> 
            <?php 

            foreach ($res as $value){
              // echo $row['user_id']."---".$value['id']."<br>";
              if($row['user_id'] === $value['id']){
              echo $value['name'];
            }else if($row['user_id'] === 0){
              echo "Unknown";
            }
            
            }
            ?></p>

<!-- flex end -->
           </div>

           <div class="d-flex flex-row mx-2">
                <a href="post/view.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success">Read More</a>
                <?php if($row['user_id'] === $_SESSION['user']['id']){?>
                  <a href="post/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-danger">Delete</a>
                <a href="post/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary">Edit</a>
              <?php }?>
           </div>

          </div>
        </div>
      </div>
      <?php } ?>

    </div>
</div>

    <script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>