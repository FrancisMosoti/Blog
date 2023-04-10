
<?php

function upload(){

  // Check if image file is a actual image or fake image
if(isset($_POST["submit"]) && isset($_FILES["fileToUpload"])) {

      // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      // var_dump($check);
      // if($check !== false) {
      //   echo "File is an image - " . $check["mime"] . ".";
      //   $uploadOk = 1;
      // } else {
      //   echo "File is not an image.<br>";
      //   $uploadOk = 0;
      // }
  
$target_dir = "uploads/";
$uploadOk = 1;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


 
  // Check file size

if ($_FILES["fileToUpload"]["size"] > 500000) {
  // echo "Sorry, your file is too large.<br>";
  $uploadOk = 0;
}

// Check if file already exists
if (file_exists($target_file)) {
  // echo "Sorry, file already exists.<br>";
  $uploadOk = 0;
}


// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
  $uploadOk = 0;
}



// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $error1 = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
return true;
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $fileName = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
    return $fileName;
  } else {
    $error2 = "Sorry, there was an error uploading your file.";
    return true;
  }
}

}

}
?>




