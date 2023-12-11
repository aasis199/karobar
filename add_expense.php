<?php 	

require	'db_connect.php';
// $valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

  $date= $_POST['date'];
  $account= $_POST['account'];
  $vendor = $_POST['vendor'];
  $ref= $_POST['ref'];
  $amount= $_POST['amount'];
  $note= $_POST['note'];

	
				$sql = "INSERT INTO expenses (date,account,vendor,ref_no,amount, note) 
				VALUES ('$date', '$account','$vendor','$ref', '$amount', '$note')";
				if($connect->query($sql) === TRUE) {
					header('location: http://localhost/karobar/page-list-expenses.php');	
			} else {
				echo('not Success');

			}

				// /else	
		
	} // if in_array 		

$connect-> close();