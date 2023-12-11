<?php 	

require	'db_connect.php';

if($_POST) {	

  $name= $_POST['name'];
  $phone= $_POST['phone'];
  $email= $_POST['email'];
  $vat= $_POST['vat'];
  $address= $_POST['address'];
  $city= $_POST['city'];

	
				$sql = "INSERT INTO suppliers (name,phone,email,vat, address,city) 
				VALUES ('$name' ,'$phone', '$email','$vat','$address', '$city')";
				if($connect->query($sql) === TRUE) {
					header('location: http://localhost/karobar/page-add-suppliers.php');	
			} else {
				echo('not Success');

			}

				// /else	
		
	} // if in_array 		

$connect-> close();