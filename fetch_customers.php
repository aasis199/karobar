
<?php 
  include("db_connect.php");
 
   $sql = "SELECT * FROM customers WHERE id='".$_POST['id']."'";
   $query = mysqli_query($connect,$sql);
   while($row = mysqli_fetch_assoc($query))
   {
         $data = $row;
   }
    echo json_encode($data);
 ?>