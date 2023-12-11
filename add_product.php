<?php
require 'db_connect.php';
session_start();

if ($_POST) {
	
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	$image = $_FILES["fileToUpload"]["name"];
	$name = $_POST['name'];
	$category = $_POST['category'];
	$sku = $_POST['sku'];
	$cost = $_POST['cost'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$brand = $_POST['brand'];
	$status = $_POST['status'];

	$sql = "INSERT INTO product (	
		name,image, cat,cost,	sku,price,description,brand,status) VALUES ('$name' ,'$image','$category','$cost','$sku',  '$price', '$description', '$brand', '$status')";
	if ($connect->query($sql) === TRUE) {
    $_SESSION['msg'] = "Product Added Succesfully";

		header('location: http://localhost/karobar/page-add-product.php');
	} else {
		echo ('not Success' . $connect -> error);
	}

    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

// } 	

$connect->close();