<?php 	
require	'db_connect.php';
session_start();

if($_POST) {	
  $date= $_POST['date'];
  $purchase_no= $_POST['purchase_no'];
  $supplier= $_POST['supplier'];
  $sku= $_POST['sku'];
  $qty= $_POST['qty'];
  $rate= $_POST['rate'];
  $amount= $_POST['amount'];
  $r_status= $_POST['r_status'];
  $p_status= $_POST['p_status'];
  $note= $_POST['note'];
	
				$sql = "INSERT INTO purchase (date,purchase_no,supplier,sku,qty,rate,amount,received_status,payment_status,note) 
				VALUES ('$date','$purchase_no','$supplier','$sku','$qty','$rate','$amount','$r_status','$p_status','$note')";

         
				if($connect->query($sql) === TRUE) {
          $updateSql = "UPDATE product set qty = qty + '$qty' WHERE sku = '$sku'";
          if ($connect->query($updateSql) === TRUE){
            $_SESSION['msg'] = "Purchase Added Succesfully";

            header('location: http://localhost/karobar/page-add-purchase.php');
          }
          else{
            echo("Failed to update stock: " . $connect -> error);
          }
			} else {
				echo('not Success' . $connect -> error);
			}
	} 
$connect-> close();




