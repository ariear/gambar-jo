<?php
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["imageupload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["imageupload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}


if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// generate image name
$generateName = uniqid();
$generateName .= '.';
$generateName .= $imageFileType;


if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["imageupload"]["tmp_name"], $target_dir . $generateName)) {
    echo "<script>location.href='https://gambarjo.herokuapp.com/?image=" . $generateName . "';</script>";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>