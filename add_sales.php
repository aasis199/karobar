<?php
require 'db_connect.php';
session_start();

if ($_POST) {
	$c_name = $_POST['name'] ;
	$c_phone = $_POST['phone'] ;	
	$subtotal = $_POST['subtotal'];
	$advance = $_POST['paid_amount'];
	$balance = $_POST['balance'];
	// $discount = $_POST['discount'];
	// $shipping = $_POST['shipping'];

	if($advance===$subtotal){
		$payment_status = "Paid";
	}
	else if($advance<$subtotal){
		$payment_status = "Pending";
	}
	else if($advance=0){
		$payment_status = "Pending";
	}
	else{
		$payment_status = $_POST['payment_status'];
	}
	$sale_status = $_POST['sale_status'];
	$biller = $_POST['biller'];
	$note = $_POST['note'];

	$sqlInsert = "INSERT INTO sales (c_name, c_phone, subtotal, advance, balance, biller,payment_status, sale_status, note) 
	VALUES ('$c_name', '$c_phone','$subtotal', '$advance','$balance', '$biller','$payment_status','$sale_status', '$note')";	

		if ($connect->query($sqlInsert) === TRUE) {
		// mysqli_query($connect, $sqlInsert);
		$lastInsertId = mysqli_insert_id($connect);
			for ($i = 0; $i <  count($_POST['productCode']); $i++) {
				$code = $_POST['productCode'][$i];
				$name = $_POST['productName'][$i];
				$qty = $_POST['quantity'][$i];
				$price = $_POST['price'][$i];
				$total = $_POST['total'][$i];

				$sqlInsertItem = "INSERT INTO invoice_order_item (order_id, item_code, item_name, order_item_quantity, order_item_price, order_item_final_amount) 
				VALUES ('".$lastInsertId."', '$code', '$name', '$qty', '$price', '$total')";			
				
				if ($connect->query($sqlInsertItem) === TRUE){
					$updateSql = "UPDATE product set qty = qty - '$qty' WHERE sku = '$code'";
						if ($connect->query($updateSql) === TRUE){
   							 $_SESSION['msg'] = "Sale Created Succesfully";

							header('location: http://localhost/karobar/page-add-sale.php');
						}
						else{
							echo("Failed to update stock: " . $connect -> error);
						}
				} else {
					echo("Error description: " . $connect -> error);
				} 
				}
				// mysqli_query($connect, $sqlInsertItem);

				}else {
					echo("Error description: " . $connect -> error);
			} 
}
$connect->close();





















// if ($connect->query($query) === TRUE) {
// 		// $updateQtySql = "SELECT `qty` FROM product WHERE name = $item";
// 		// $updatedQty = $connect->query($updateQtySql);
// 		// // echo $updatedQty;

// 		// $updatedResult = $updatedQty->fetch_assoc();
// 		// $updatedQty = $updatedResult - $quantity;		

// 		// $updateProductTable = "UPDATE product SET qty = '".$updatedQty."' WHERE name = ".$item."";
// 		// $connect->query($updateProductTable);
// 		header('location: http://localhost/karobar/page-add-sale.php');
// 	} else {
// 		echo("Error description: " . $connect -> error);

// 	}	