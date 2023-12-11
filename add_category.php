<?php 	

require	'db_connect.php';
session_start();


if($_POST) {	

  $name= $_POST['name'];
  $code = $_POST['code'];
	
				$sql = "INSERT INTO category (name, code) 
				VALUES ('$name' , '$code')";
				if($connect->query($sql) === TRUE) {
    $_SESSION['msg'] = "Category Added Succesfully";

					header('location: http://localhost/karobar/page-add-category.php');	
			} else {
				echo('not Success');

			}

				// /else	
		
	} // if in_array 		

$connect-> close();