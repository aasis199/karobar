
<?php 
  include("db_connect.php");
 
   $sql = "SELECT * FROM sales WHERE order_id='".$_POST['id']."'";
   $query = mysqli_query($connect,$sql);
   while($row = mysqli_fetch_assoc($query))
   {
         $data = $row;
   }
    echo json_encode($data);
 ?>