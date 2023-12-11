<?php
include 'db_connect.php';


$orderId = 0;
if(isset($_POST['orderId'])){
    $orderId = mysqli_real_escape_string($connect, $_POST['orderId']);
}
$sql = "SELECT * FROM sales WHERE id=".$orderId;
$result = mysqli_query($connect,$sql);

while( $row = mysqli_fetch_array($result) ){
   
  $balance = $row['balance'];
  $response = "<div class='form-group'><label for='id' class='col-sm-3 control-label'>Order Id</label><div class='col-sm-9'> <input type='number' class='form-control' id='id' name='id'  value='$orderId'></div>";


  $response .= " <div class='form-group'><label for='due' class='col-sm-3 control-label'>Due Amount</label><div class='col-sm-9'> <input type='text' class='form-control' id='due' name='due' ";

      $response .= "value='$balance'/>

                        </div>
                    </div>";

    $response .= "<div class='form-group'>
    <label for='payAmount' class='col-sm-3 control-label'>Pay Amount</label>
    <div class='col-sm-9'>
        <input type='text' class='form-control' id='payAmount'
            name='payAmount' value='$balance' />
    </div>
</div>";

$response .= " <div class='form-group'>
<label for='clientContact' class='col-sm-3 control-label'>Payment Status</label>
<div class='col-sm-9'>
  <select class='form-control' name='paymentStatus'>
      <option value=''>~~SELECT~~</option>
      <option >Pending</option>
      <option >Paid</option>
  </select>
</div>
</div>";

}

echo $response;
exit; 