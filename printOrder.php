<?php    

require_once 'db_connect.php';

$orderId = $_POST['orderId'];

$sql = "SELECT * FROM sales WHERE id = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();
$orderDate = $orderData[1];
$clientName = $orderData[2];
$clientContact = $orderData[3]; 
$subTotal = $orderData[4];
$paid = $orderData[5];
$due = $orderData[6];

// $orderItemSql = "SELECT invoice_order_item.item_name, invoice_order_item.order_item_price, invoice_order_item.order_item_quantity, invoice_order_item.order_item_final_amount,
// product.name FROM invoice_order_item
//    INNER JOIN product ON invoice_order_item.item_code = product.sku
//  WHERE invoice_order_item.order_id = $orderId";
// $orderItemResult = $connect->query($orderItemSql);

$orderItemSql = "SELECT * FROM invoice_order_item WHERE invoice_order_item.order_id = $orderId";
$orderItemResult = $connect->query($orderItemSql);

$table = '<style>
.star img {
    visibility: visible;
}</style>
<table align="center" cellpadding="0" cellspacing="0" style="width: 100%;border:1px solid black;margin-bottom: 10px;margin-top: 30px;">
               <tbody>
                  <tr>
                     <td colspan="5" style="text-align:center;color: black;text-decoration: underline;    font-size: 25px;">TAX INVOICE</td>
                  </tr>
                  <tr>
                     <td rowspan="8" colspan="2" style="border-left:1px solid black;" background-image="logo.jpg"><img src="https://omframehouse.com.np/images/karobar_logo.png" alt="logo" width="250px;"></td>
                     <td colspan="3" style=" text-align: right;">ORIGINAL</td>
                  </tr>
                  <tr>
                     <td colspan="3" style=" text-align: right;"></td>
                  </tr>
                  <tr>
                     <td colspan="3" style=" text-align: right;color: black;font-style: italic;font-weight: 600;text-decoration: underline;font-size: 25px;"></td>
                  </tr>
                  <tr>
                     <td colspan="3" style=" text-align: right;">Lazimpat</td>
                  </tr>
                  <tr>
                     <td colspan="3" style=" text-align: right;">Kathmandu 44600</td>
                  </tr>
                  <tr>
                     <td colspan="3" style=" text-align: right;">Tel: 1234567890,1478523690.</td>
                  </tr>
                  <tr>
                     <td colspan="3" style=" text-align: right;">Email: karobar@mail.com</td>
                  </tr>
                  <tr>
                     <td colspan="3" style=" text-align: right;color: blue;text-decoration: underline;"></td>
                  </tr>
                  <tr>
                     <td colspan="2" style="padding: 0px;vertical-align: top;">
                        <table align="left" cellpadding="0" cellspacing="0" style="border: thin solid black; width: 100%;margin-top: 30px;">
                           <tbody>
                              <tr>
                                 <td style="padding: 10px;width: 74px;vertical-align: top;color: black;" rowspan="3">Bill to: </td>
                                 <td style="padding: 10px;">'.$clientName.'</td>
                              </tr>
                           </tbody>
                        </table>
                        <table align="left" cellspacing="0" style="width: 100%; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-width: thin; border-bottom-width: thin; border-left-width: thin; border-right-color: black; border-bottom-color: black; border-left-color: black;">
                           <tbody>
                           <tr>
                           <td style="padding: 10px;width: 74px;vertical-align: top;color: black;" rowspan="3">Contact: </td>
                           <td style="padding: 10px;">'.$clientContact.'</td>
                        </tr>
                           </tbody>
                        </table>
                     </td>
                     <td style=" padding: 0px;vertical-align: top;" colspan="3">
                        <table align="left" cellpadding="0" cellspacing="0" style="width: 100%;margin-top: 30px;margin-bottom: 30px;">
                           <tbody>
                              <tr>
                                 <td style="border-bottom-style: solid;border-bottom-width: thin;border-bottom-color: black;border-top: 1px solid black;border-right: 1px solid black;color: black;padding: 10px;">Bill No : '.$orderData[0].'</td>
                              </tr>
                              <tr>
                                 <td style="border-bottom-style: solid;border-bottom-width: thin;border-bottom-color: black;border-right: 1px solid black;padding: 10px;color: black;">Date: '.$orderDate.'</td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr style="margin-top: 30px;">
                     <td style="width: 90px;text-align: center;background-color: black;color: white;border-right: 1px solid white;border-left: 1px solid black;border-bottom: 1px solid black;-webkit-print-color-adjust: exact;">S/N.<br> </td>
                     <td style="width: 50%;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: white;border-bottom-color: black;color: white;background-color: black;-webkit-print-color-adjust: exact;">Description Of Goods</td>
                     <td style="width: 150px;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: #fff;border-bottom-color: black;background-color: black;color: white;-webkit-print-color-adjust: exact;">Qty.</td>
                     <td style="width: 150px;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: #fff;border-bottom-color: black;background-color: black;color: white;-webkit-print-color-adjust: exact;">Rate&nbsp; Rs.<br> </td>
                     <td style="width: 150px;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: black;border-bottom-color: black;color: white;background-color: black;-webkit-print-color-adjust: exact;">Amount&nbsp; Rs.<br>                     </td>
                  </tr>';
                  $x = 1;
                 
            while($row = $orderItemResult->fetch_array(MYSQLI_ASSOC)) {       
                        
               $table .= '<tr >
                     <td style="padding: 10px;border-left: 1px solid black;border-right: 1px solid black;height: 27px;">'.$x.'</td>
                     <td style="padding: 10px;border-left: 1px solid black;height: 27px;">'.$row['item_name'].'</td>
                     <td style="padding: 10px;border-left: 1px solid black;height: 27px;">'.$row['order_item_quantity'].'</td>
                     <td style="padding: 10px;border-left: 1px solid black;height: 27px;">'.$row['order_item_price'].'</td>
                     <td style="padding: 10px;border-left: 1px solid black;border-right: 1px solid black;height: 27px;">'.$row['order_item_final_amount'].'</td>
                  </tr>
               ';
            $x++;
            } // /while
                $table.= '
                  <tr style="border-bottom: 1px solid black;">
                     <td style="border-left: 1px solid black;border-right: 1px solid black;height: 27px;"></td>
                     <td style="border-left: 1px solid black;height: 27px;"></td>
                     <td style="border-left: 1px solid black;height: 27px;"></td>
                     <td style="padding: 10px;width: 218px;border-right-style: solid;border-bottom-style: solid;border-right-width: thin;border-bottom-width: thin;border-right-color: black;border-bottom-color: #000;border-top: 1px solid black;border-bottom: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;color: black;padding-left: 5px;-webkit-print-color-adjust: exact;">Total</td>
                     <td style="padding: 10px;width: 218px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-width: thin; border-right-width: thin; border-bottom-width: thin; border-top-color: black; border-right-color: black; border-bottom-color: black;">'.$subTotal.'</td>
                  </tr>
                  <tr>
                  <td rowspan="2" style="border-left: 1px solid black;height: 27px;"></td>
                  <td rowspan="2" style="border-left: 1px solid black;height: 27px;"></td>
                  <td rowspan="2" style="border-left: 1px solid black;height: 27px;"></td>
                     <td rowspan="2" style="padding: 10px;border-top: 1px solid black;border-bottom: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;width: 218px;color: black;background-color: ;padding-left: 5px;-webkit-print-color-adjust: exact;">Paid Amount</td>
                     <td rowspan="2" style="padding: 10px;border-top: 1px solid black;border-bottom: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;width: 288px;">'.$paid.'</td>
                  </tr>
                  <tr>
                     <td colspan="3" style="border-bottom: 1px solid black;width: 859px;border-left: 1px solid black;padding: 5px;"></td>
                  </tr>
                  <tr>
                  <td rowspan="2" style="border-left: 1px solid black;height: 27px;"></td>
                  <td rowspan="2" style="border-left: 1px solid black;height: 27px;"></td>
                  <td rowspan="2" style="border-left: 1px solid black;height: 27px;"></td>
                     <td rowspan="2" style="padding: 10px;border-top: 1px solid black;border-bottom: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;width: 149px;background-color: ;color: black;padding-left: 5px;-webkit-print-color-adjust: exact;">Balance</td>
                     <td rowspan="2" style="padding: 10px;border-top: 1px solid black;border-bottom: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;width:218px;border-bottom: 1px solid black;border-right: 1px solid black;">'.$due.'
                     </td>
                  </tr>
               </tbody>
            </table>';
$connect->close();

echo $table;