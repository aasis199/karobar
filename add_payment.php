<?php 	

require	'db_connect.php';
session_start();

if($_POST) {	
  $id = $_POST["id"];
  $due= $_POST['due'];
  $amount = $_POST['payAmount'];
$p_status = $_POST['paymentStatus'];
if($amount < $due){
	$final = $due - $amount;
}
else {
	$final = $amount - $due;
}
	
				$sql = "UPDATE sales SET `balance`= '$final', `payment_status`= '$p_status' WHERE id = $id";
				if($connect->query($sql) === TRUE) {
                $_SESSION['msg'] = "Payment Recorded Succesfully";

					header('location: http://localhost/karobar/page-list-sale.php');	
			} else {
				echo('not Success'). $connect -> error;

			}

				// /else	
		
	} // if in_array 		

$connect-> close();