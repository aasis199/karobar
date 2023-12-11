<?php 	

require	'db_connect.php';
// $valid['success'] = array('success' => false, 'messages' => array());
session_start();

if($_POST) {	

  $name= $_POST['name'];
  $phone= $_POST['phone'];
  $vat = $_POST['vat'];
  $email= $_POST['email'];
  $address= $_POST['address'];
  $city= $_POST['city'];

	
				$sql = "INSERT INTO supplier (name,phone,vat,email,address,city) 
				VALUES ('$name' ,'$phone', '$vat','$email','$address', '$city')";
				if($connect->query($sql) === TRUE) {
    $_SESSION['msg'] = "Supplier Added Succesfully";

					header('location: http://localhost/karobar/page-add-suppliers.php');	
			} else {
				echo('not Success');

			}

				// /else	
		
	} // if in_array 		

$connect-> close();