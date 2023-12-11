<?php 	

require	'db_connect.php';
session_start();
if($_POST) {	

  $name= $_POST['name'];
  $phone= $_POST['phone'];

  $email= $_POST['email'];
  $address= $_POST['address'];
  $city= $_POST['city'];

	
				$sql = "INSERT INTO customers (name,phone,email,address,city) 
				VALUES ('$name' ,'$phone', '$email','$address', '$city')";
				if($connect->query($sql) === TRUE) {
    $_SESSION['msg'] = "Customer Added Succesfully";

					header('location: http://localhost/karobar/page-add-customers.php');	
			} else {
				echo('not Success');

			}

				// /else	
		
	} // if in_array 		

$connect-> close();